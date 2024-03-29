<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_rendered()
    {
        $response = $this->get(route('auth.loginPage'));

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('main'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);

        $this->assertGuest();
    }
}
