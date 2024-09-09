<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    private const API_URL = '/api/property';

    public function test_api_property_reachable(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );
        $response = $this->getJson(self::API_URL);
        $response->assertStatus(200);
    }

    public function test_api_property_table_empty(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );
        $response = $this->getJson(self::API_URL);
        $response->assertJsonCount(0, 'data');
    }

    public function test_api_property_table_non_empty(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );
        Property::factory()->count(1)->create();
        $response = $this->getJson(self::API_URL);
        $response->assertJsonCount(1, 'data');
    }

    public function test_api_property_route_doesnt_contain_11th_record(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );
        $properties = Property::factory(11)->create();
        $lastProperty = $properties->last();
        $this->getJson(self::API_URL)
            ->assertStatus(200)
            ->assertJsonPath('data', fn(array $data) => !collect($data)->contains($lastProperty->toArray()));
    }
}
