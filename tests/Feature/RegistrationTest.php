<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_register_and_is_signed_in(): void
    {
        $response = $this->post('/register', [
            'name' => 'Petugas Baru',
            'email' => 'petugas@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $user = User::where('email', 'petugas@example.com')->firstOrFail();

        $response->assertRedirect(route('laporan.index'));
        $response->assertSessionHas('success', 'Registrasi berhasil!');
        $this->assertAuthenticatedAs($user);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_registration_shows_validation_errors_for_invalid_input(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }
}
