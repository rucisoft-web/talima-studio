<?php

namespace App\Services\Ai;

use App\Models\AiUsageLog;
use App\Models\User;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Pembungkus tipis OpenAI Chat Completions dengan structured output (JSON Schema).
 * Hanya dipanggil dari backend; setiap panggilan dicatat ke ai_usage_logs.
 */
class OpenAiClient
{
    public function __construct(
        private readonly ?string $apiKey,
        private readonly ?string $model,
        private readonly string $baseUrl,
        private readonly int $timeout,
        private readonly ?string $organization = null,
    ) {}

    public static function fromConfig(): self
    {
        return new self(
            apiKey: config('services.openai.api_key'),
            model: config('services.openai.model'),
            baseUrl: config('services.openai.base_url'),
            timeout: config('services.openai.timeout'),
            organization: config('services.openai.organization'),
        );
    }

    public function isConfigured(): bool
    {
        return filled($this->apiKey) && filled($this->model);
    }

    /**
     * Minta keluaran JSON yang sesuai skema dan kembalikan hasil yang sudah di-decode.
     *
     * @param  array<int, array{role: string, content: string}>  $messages
     * @param  array<string, mixed>  $schema
     * @return array<string, mixed>
     */
    public function structured(
        array $messages,
        string $schemaName,
        array $schema,
        string $purpose,
        ?User $user = null,
        ?string $promptVersion = null,
        ?string $idempotencyKey = null,
    ): array {
        if (! $this->isConfigured()) {
            throw new RuntimeException('OpenAI belum dikonfigurasi: isi OPENAI_API_KEY dan OPENAI_MODEL.');
        }

        if ($idempotencyKey && AiUsageLog::where('request_id', $idempotencyKey)->where('status', 'succeeded')->exists()) {
            throw new RuntimeException("Permintaan AI {$idempotencyKey} sudah pernah berhasil diproses.");
        }

        $log = AiUsageLog::updateOrCreate(
            ['request_id' => $idempotencyKey ?? (string) str()->uuid()],
            [
                'user_id' => $user?->getKey(),
                'purpose' => $purpose,
                'model' => $this->model,
                'prompt_version' => $promptVersion,
                'status' => 'pending',
                'error' => null,
            ],
        );

        $startedAt = hrtime(true);

        try {
            $response = Http::baseUrl($this->baseUrl)
                ->withToken($this->apiKey)
                ->withHeaders(array_filter(['OpenAI-Organization' => $this->organization]))
                ->timeout($this->timeout)
                ->acceptJson()
                ->post('/chat/completions', [
                    'model' => $this->model,
                    'messages' => $messages,
                    'response_format' => [
                        'type' => 'json_schema',
                        'json_schema' => [
                            'name' => $schemaName,
                            'strict' => true,
                            'schema' => $schema,
                        ],
                    ],
                ])
                ->throw();
        } catch (RequestException $e) {
            $log->update([
                'status' => 'failed',
                'error' => $e->response->json('error.message') ?? $e->getMessage(),
                'duration_ms' => $this->elapsedMs($startedAt),
            ]);

            throw $e;
        }

        $content = $response->json('choices.0.message.content');
        $decoded = is_string($content) ? json_decode($content, true) : null;

        $log->update([
            'status' => is_array($decoded) ? 'succeeded' : 'failed',
            'error' => is_array($decoded) ? null : 'Keluaran AI bukan JSON yang valid.',
            'input_tokens' => (int) $response->json('usage.prompt_tokens', 0),
            'output_tokens' => (int) $response->json('usage.completion_tokens', 0),
            'duration_ms' => $this->elapsedMs($startedAt),
        ]);

        if (! is_array($decoded)) {
            throw new RuntimeException('Keluaran AI bukan JSON yang valid.');
        }

        return $decoded;
    }

    private function elapsedMs(int $startedAt): int
    {
        return (int) ((hrtime(true) - $startedAt) / 1_000_000);
    }
}
