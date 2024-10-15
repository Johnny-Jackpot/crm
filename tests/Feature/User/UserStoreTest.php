<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserStoreTest extends TestCase
{
    use RefreshDatabase;

    private const API_URL = '/api/users/';

    public function test_api_store_users_protected_from_anon_users(): void
    {
        $response = $this->postJson(self::API_URL);
        $response->assertStatus(403);
    }

    public function test_api_users_protected_from_regular_users()
    {
        $user = User::factory()->count(1)->create()->first();
        $this->actingAsUser($user);
        $response = $this->postJson(self::API_URL);
        $response->assertStatus(403);
    }

    public function test_api_users_admin_can_create_user()
    {
        $admin = User::factory()
            ->count(1)
            ->create([
                'roles' => [User::ROLE_ADMIN]
            ])
            ->first();
        $this->actingAsUser($admin);

        $email = 'testemail1@example.com';
        $response = $this->postJson(self::API_URL, [
            'email' => $email,
            'password' => 'Aa111*11',
            'roles' => [User::ROLE_REGULAR],
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);
    }
}
