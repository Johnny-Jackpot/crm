<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    private const API_URL = '/api/property';

    public function test_api_property_reachable(): void
    {
        $response = $this->get(self::API_URL);
        $response->assertStatus(200);
    }

    public function test_api_property_table_empty(): void
    {
        $response = $this->get(self::API_URL);
        $response->assertJsonCount(0, 'data');
    }

    public function test_api_property_table_non_empty(): void
    {
        Property::factory()->count(1)->create();
        $response = $this->get(self::API_URL);
        $response->assertJsonCount(1, 'data');
    }
}
