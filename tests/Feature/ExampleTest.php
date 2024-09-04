<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Documentation');
    }

    public function test_the_application_contains_symfony(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Symfony');
    }
}
