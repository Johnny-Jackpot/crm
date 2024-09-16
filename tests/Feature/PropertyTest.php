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

    private const API_URL = '/api/property/';

    public function setUp(): void
    {
        parent::setUp();

        Sanctum::actingAs(
            User::factory()->create(),
            ['view-property']
        );
    }

    public function test_api_property_reachable(): void
    {
        $response = $this->getJson(self::API_URL);
        $response->assertStatus(200);
    }

    public function test_api_property_table_empty(): void
    {
        $response = $this->getJson(self::API_URL);
        $response->assertJsonCount(0, 'data');
    }

    public function test_api_property_table_non_empty(): void
    {
        Property::factory()->count(1)->create();
        $response = $this->getJson(self::API_URL);
        $response->assertJsonCount(1, 'data');
    }

    public function test_api_property_route_doesnt_contain_11th_record(): void
    {
        $properties = Property::factory(11)->create();
        $lastProperty = $properties->last();
        $this->getJson(self::API_URL)
            ->assertStatus(200)
            ->assertJsonPath('data', fn(array $data) => !collect($data)->contains($lastProperty->toArray()));
    }

    public function test_api_property_created_successful()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['store-property']
        );

        $data = [
            'name' => 'Test property',
            'price' => 1000,
            'bedrooms' => 2,
            'bathrooms' => 1,
            'storeys' => 1,
            'garages' => 0,
        ];

        $this->postJson(self::API_URL, $data)
            ->assertStatus(201)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('properties', $data);

        $lastProduct = Property::query()->latest()->first();
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $lastProduct->$key);
        }
    }

    public function test_api_property_viewed_successfully()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['view-property']
        );

        $property = Property::factory()->create();
        $this->getJson(self::API_URL . $property->id)
            ->assertStatus(200)
            ->assertJsonFragment($property->toArray());
    }
}
