<?php

namespace Tests\Feature\User;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
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
}
