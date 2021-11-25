<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_1()
    {
        $response = $this->post('/items', ['title' => 'Testing']);

        $response->assertSessionDoesntHaveErrors();

        $response = $this->post('/items', []);

        $response->assertSessionHasErrors('title');

        $response = $this->post('/items', ['title' => 'T']);

        $response->assertSessionHasErrors('title');

        $response = $this->post('/items', ['title' => 'Testing Testing Testing Testing Testing']);

        $response->assertSessionHasErrors('title');
    }
}
