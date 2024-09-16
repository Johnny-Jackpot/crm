<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyAuthTest extends TestCase
{
    public function test_api_property_unauthenticated_user_cannot_access()
    {
        $this->getJson('/api/property')
            ->assertStatus(401)
            ->assertJson([
                'error' => 'Unauthorized.'
            ]);
    }
}
