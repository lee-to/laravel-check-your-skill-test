<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->boolean('active')->default(true);

            $table->softDeletes();

            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('description')->after('title')->nullable();

            if (Schema::hasColumn('posts', 'active')) {
                $table->boolean('main')->default(false);
            }

            $table->renameColumn('title', 'name');
        });

        Schema::rename('posts', 'articles');

        Schema::create('article_category', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Article::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // TODO Migrations Задание 11: Удалить таблицы categories, articles, article_category если такие существуют
        Schema::dropIfExists('categories');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_category');
    }
}
