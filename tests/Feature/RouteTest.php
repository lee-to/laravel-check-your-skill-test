<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_1()
    {
        $response = $this->get('/hello');
        $response->assertViewIs('hello');
    }

    public function test_task_2()
    {
        $response = $this->get('/');
        $response->assertViewIs('welcome');
        $response->assertViewHas('title', 'Welcome');
    }

    public function test_task_3()
    {
        $response = $this->get(route('contact'));
        $response->assertViewIs('pages.contact');
    }

    public function test_task_4()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/{$user->id}");

        $response->assertOk();
        $response->assertViewIs('users.show');
    }

    public function test_task_5()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/bind/{$user->id}");

        $response->assertOk();
        $response->assertViewIs('users.show');
    }

    public function test_tasks_4_5_notfound()
    {
        $response = $this->get('/user/test');
        $response->assertNotFound();
    }

    public function test_task_6()
    {
        $response = $this->get('/bad');

        $response->assertRedirect('/good');
    }

    public function test_task_7()
    {
        $user = User::factory()->create();

        $response = $this->get('/users_crud');

        $response->assertViewIs('users.index');
        $response->assertViewHas('users');

        $response = $this->get("/users_crud/{$user->id}");

        $response->assertViewIs('users.show');
        $response->assertViewHas('user');

        $response = $this->get('/users_crud/create');

        $response->assertViewIs('users.form');

        $response = $this->get("/users_crud/{$user->id}/edit");

        $response->assertViewIs('users.form');

        $response = $this->post('/users_crud', $this->getUserRequestData());

        $response->assertRedirect('/users_crud');

        $response = $this->put("/users_crud/{$user->id}", $this->getUserRequestData());

        $response->assertRedirect('/users_crud');

        $response = $this->delete("/users_crud/{$user->id}");

        $response->assertRedirect('/users_crud');
    }

    public function test_tasks_8_12()
    {
        $response = $this->get('/dashboard/admin');
        $response->assertViewIs('welcome');

        $response = $this->post('/dashboard/admin/post');
        $response->assertViewIs('welcome');
        $response->assertStatus(200);


        $response = $this->get('/security/admin/auth');
        $response->assertRedirect('login');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/security/admin/auth');
        $response->assertStatus(200);
    }

    public function test_task_13()
    {
        $userAuth = User::factory()->create();

        $response = $this->actingAs($userAuth)->get('/api/v1/users');
        $response->assertOk();

        $data = $this->getUserRequestData();
        $response = $this->actingAs($userAuth)->post('/api/v1/users', $data);
        $response->assertCreated();
        $this->assertDatabaseHas(User::class, $data);

        $user = User::factory()->create();
        $data = $this->getUserRequestData();
        $response = $this->actingAs($userAuth)->put('/api/v1/users/' . $user->id, $data);
        $response->assertOk();
        $this->assertDatabaseHas(User::class, $data);

        $data = $this->getUserRequestData();
        $response = $this->actingAs($userAuth)->delete('/api/v1/users/' . $user->id);
        $response->assertNoContent();
        $this->assertDatabaseMissing(User::class, $data);
    }

    private function getUserRequestData()
    {
        return [
            'name' => 'Name '.rand(1, 1000),
            'email' => uniqid() . '@example.com',
            'password' => '123'
        ];
    }
}
