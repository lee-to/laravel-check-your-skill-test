<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationsTest extends TestCase
{
    public function test_migrate(): void
    {
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate', ['--path' => 'database/migrations/tasks']);
    }

    public function test_tables_exists(): void
    {
        $this->assertTrue(Schema::hasTable('categories'));
        $this->assertTrue(Schema::hasTable('articles'));
        $this->assertTrue(Schema::hasTable('article_category'));
    }

    public function test_columns_exists(): void
    {
        $this->assertTrue(Schema::hasColumn('categories', 'title'));

        $this->assertTrue(Schema::hasColumns('articles', ['name', 'description', 'active', 'main']));
    }

    public function test_soft_delete(): void
    {
        $this->assertTrue(Schema::hasColumns('articles', ['deleted_at']));
    }

    public function test_timestamps(): void
    {
        $this->assertTrue(Schema::hasColumns('articles', ['created_at', 'updated_at']));
    }

    public function test_default_nullable(): void
    {
        $article = Article::factory()->create(['name' => null]);

        $this->assertNull($article->name);
    }

    public function test_relation_table(): void
    {
        $categories = Category::factory()->count(3);

        $article = Article::factory()->has($categories)->create();

        $this->assertEquals($article->categories->count(), 3);
    }
}
