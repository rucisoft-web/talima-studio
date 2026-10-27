<?php

namespace Tests\Feature;

use App\Models\AiUsageLog;
use App\Models\User;
use App\Services\Ai\OpenAiClient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Tests\TestCase;

class OpenAiClientTest extends TestCase
{
    use RefreshDatabase;

    private function client(): OpenAiClient
    {
        return new OpenAiClient('sk-test', 'gpt-test', 'https://api.openai.test/v1', 30);
    }

    public function test_it_refuses_to_run_without_configuration(): void
    {
        $this->expectException(RuntimeException::class);

        (new OpenAiClient(null, null, 'https://api.openai.test/v1', 30))
            ->structured([], 'x', [], 'test');
    }

    public function test_it_returns_structured_output_and_logs_usage(): void
    {
        Http::fake([
            'api.openai.test/*' => Http::response([
                'choices' => [['message' => ['content' => '{"judul":"Bilangan Bulat"}']]],
                'usage' => ['prompt_tokens' => 120, 'completion_tokens' => 30],
            ]),
        ]);
        $user = User::factory()->create();

        $result = $this->client()->structured(
            messages: [['role' => 'user', 'content' => 'Buat judul']],
            schemaName: 'lesson_title',
            schema: ['type' => 'object', 'properties' => ['judul' => ['type' => 'string']], 'required' => ['judul'], 'additionalProperties' => false],
            purpose: 'lesson.title',
            user: $user,
            promptVersion: 'v1',
            idempotencyKey: 'job-1',
        );

        $this->assertSame(['judul' => 'Bilangan Bulat'], $result);
        Http::assertSent(fn ($request) => $request->hasHeader('Authorization', 'Bearer sk-test')
            && $request['response_format']['type'] === 'json_schema');

        $log = AiUsageLog::sole();
        $this->assertSame('succeeded', $log->status);
        $this->assertSame(120, $log->input_tokens);
        $this->assertSame(30, $log->output_tokens);
        $this->assertSame($user->id, $log->user_id);
    }

    public function test_it_logs_failed_requests(): void
    {
        Http::fake([
            'api.openai.test/*' => Http::response(['error' => ['message' => 'quota habis']], 429),
        ]);

        try {
            $this->client()->structured([], 'x', [], 'lesson.title', idempotencyKey: 'job-2');
            $this->fail('Seharusnya melempar exception.');
        } catch (RequestException) {
            //
        }

        $log = AiUsageLog::sole();
        $this->assertSame('failed', $log->status);
        $this->assertSame('quota habis', $log->error);
    }

    public function test_it_does_not_repeat_a_succeeded_request(): void
    {
        AiUsageLog::create(['request_id' => 'job-3', 'purpose' => 'x', 'model' => 'gpt-test', 'status' => 'succeeded']);
        Http::fake();

        $this->expectException(RuntimeException::class);

        try {
            $this->client()->structured([], 'x', [], 'x', idempotencyKey: 'job-3');
        } finally {
            Http::assertNothingSent();
        }
    }
}
