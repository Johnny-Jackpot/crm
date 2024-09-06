<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    public function test_api_property_reachable(): void
    {
        $response = $this->get('/api/property');
        $response->assertStatus(200);
    }

    public function test_api_property_table_empty(): void
    {
        $response = $this->get('/api/property');
        $response->assertJsonCount(0, 'data');
    }
}
