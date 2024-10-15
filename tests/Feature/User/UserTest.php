<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private const API_URL = '/api/users/';

    public function test_api_users_protected_from_anon_users(): void
    {
        $response = $this->getJson(self::API_URL);
        $response->assertStatus(403);
    }

    public function test_api_users_protected_from_regular_users()
    {
        $user = User::factory()->count(1)->create()->first();
        $this->actingAsUser($user);
        $response = $this->getJson(self::API_URL);
        $response->assertStatus(403);
    }

    public function test_api_users_available_for_admin_users()
    {
        $user = User::factory()
            ->count(1)
            ->create([
                'roles' => [User::ROLE_ADMIN]
            ])
            ->first();
        $this->actingAsUser($user);
        $response = $this->getJson(self::API_URL);
        $response->assertStatus(200);
    }
}
