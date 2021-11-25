<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_1()
    {
        $user = User::factory()->create(['id' => 1]);

        $this->assertFalse($user->can('create', Item::class));

        $user = User::factory()->create(['id' => 10]);

        $this->assertTrue($user->can('create', Item::class));
    }
}
