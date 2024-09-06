<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
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
}
