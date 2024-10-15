<?php

namespace Tests\Feature\Property;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyAuthTest extends TestCase
{
    public function test_api_property_unauthenticated_user_cannot_access()
    {
        $this->getJson('/api/properties')
            ->assertStatus(401)
            ->assertJson([
                'error' => 'Unauthorized.'
            ]);
    }
}
