<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_brand(): void
    {
        $this->get('/')->assertOk()->assertSee('Cerdas Mengajar, Berkah Berkarya.');
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_user_can_register(): void
    {
        $this->get('/register')->assertOk();

        $this->post('/register', [
            'name' => 'Guru Baru',
            'email' => 'guru@example.com',
            'password' => 'rahasia-panjang-123',
            'password_confirmation' => 'rahasia-panjang-123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
    }

    public function test_user_can_login_and_see_dashboard(): void
    {
        $user = User::factory()->create();

        $this->get('/login')->assertOk();
        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect('/dashboard');

        $this->get('/dashboard')->assertOk()->assertSee($user->name);
    }

    public function test_login_fails_with_wrong_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', ['email' => $user->email, 'password' => 'salah'])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }
}
