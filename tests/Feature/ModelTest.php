<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_1()
    {
        $item = ['title' => 'Test'];
        Item::create($item);

        $this->assertDatabaseHas('products', $item);
    }

    public function test_task_2()
    {
        $item1 = Item::factory()->create(['active' => true, 'created_at' => now()->subMinutes(5)]);
        $item2 = Item::factory()->create(['active' => true, 'created_at' => now()->subMinutes(4)]);
        $item3 = Item::factory()->create(['active' => false, 'created_at' => now()->subMinutes(3)]);
        $item4 = Item::factory()->create(['active' => true, 'created_at' => now()->subMinutes(2)]);
        $item5 = Item::factory()->create(['active' => true, 'created_at' => now()->subMinute()]);

        $response = $this->get('/eloquent/task2');

        $response->assertDontSee($item3->title);
        $response->assertDontSee($item1->title);

        $response->assertSee('1.' . $item5->title);
        $response->assertSee('2.' . $item4->title);
        $response->assertSee('3.' . $item2->title);
    }

    public function test_task_3()
    {
        $item = Item::factory()->create(['active' => false]);

        $response = $this->get('/eloquent/task3');
        $response->assertDontSee($item->title);
    }

    public function test_task_4()
    {
        $response = $this->get('/eloquent/task4/1');
        $response->assertStatus(404);

        $item = Item::factory()->create();
        $response = $this->get('/eloquent/task4/' . $item->id);
        $response->assertStatus(200);
        $response->assertViewHas('product', $item);

    }

    public function test_task_5() {
        $response = $this->post('/eloquent/task5', ['title' => 'Test']);
        $response->assertRedirect();
        $this->assertDatabaseHas('products', ['title' => 'Test']);
    }

    public function test_task_6() {
        $item = new Item();
        $item->title = 'Old title';
        $item->save();

        $this->assertDatabaseHas('products', ['title' => 'Old title']);

        $response = $this->post('/eloquent/task6/' . $item->id, ['title' => 'New title']);
        $response->assertRedirect();

        $this->assertDatabaseMissing('products', ['title' => 'Old title']);
        $this->assertDatabaseHas('products', ['title' => 'New title']);
    }

    public function test_task_7() {
        $products = Item::factory(4)->create();
        $this->assertDatabaseCount('products', 4);

        $response = $this->delete('/eloquent/task7', [
            'products' => $products->pluck('id', 'id')
        ]);

        $response->assertRedirect();
        $this->assertDatabaseCount('products', 0);
    }
}
