<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class BladeTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_1(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewIs('welcome');
        $response->assertViewHas('users');
    }

    public function test_task_2(): void
    {
        $response = $this->get('/table');

        $response->assertOk();
        $response->assertSee('Layout');
    }

    public function test_task_3(): void
    {
        $response = $this->get('/table');

        $response->assertOk();
        $response->assertSee('Menu Item 1');
    }

    public function test_task_4(): void
    {
        $user = User::factory()->create();

        $response = $this->get('/auth');
        $response->assertOk();
        $response->assertDontSee($user->id);

        $response = $this->actingAs($user)->get('/auth');
        $response->assertOk();
        $response->assertSee($user->id);
    }

    public function test_task_5(): void
    {
        $aliases = Blade::getClassComponentAliases();

        $this->assertTrue(isset($aliases['hello']));

        $response = $this->get('/');
        $response->assertOk();

        $response->assertSee(now()->format('Y-m-d'));
    }

    public function test_task_6_7(): void
    {
        $response = $this->get('/table');
        $response->assertDontSee(`class="bg-red-500"`);
        $this->assertStringContainsString('Ничего не найдено', $response->content());

        User::factory()->count(10)->create();

        $response = $this->get('/table');
        $response->assertSee(`class="bg-red-500"`);

        $this->assertStringNotContainsString('Ничего не найдено', $response->content());
    }
}
