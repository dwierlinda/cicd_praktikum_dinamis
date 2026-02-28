<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/auth'); // ganti dari '/' ke '/auth'
        $response->assertStatus(200);
    }
}