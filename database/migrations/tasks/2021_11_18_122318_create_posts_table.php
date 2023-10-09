<?php

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
            $table->string('title')->nullable()->default(null);
            $table->timestamps();
        });

        //TODO Migrations Задание 9: Переименовать таблицу posts в articles
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            //TODO Migrations Задание 8: Переименовать поле title в name
            $table->string('name')->nullable();
            //TODO Migrations Задание 6: Добавить поле description типа text (DEFAULT NULL) ПОСЛЕ поля title
            $table->text('description')->default(null)->nullable();
            //TODO Migrations Задание 3: Для active указать что значение по умолчанию TRUE
            //TODO Migrations Задание 4: Добавить функционал soft delete
            //TODO Migrations Задание 5: Добавить поля с timestamps (created_at, updated_at) через 1 метод
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        //TODO Migrations Задание 7: Сделать провеку на наличие поля active и в случаи успеха добавить поле main (boolean default false)
        if (Schema::hasColumn('articles', 'active')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->boolean('main')->default(false)->after('active');
            });
        }

        //TODO Migrations Задание 10: Добавить таблицу для связи articles и categories (belongsToMany) c foreign ключами
        Schema::create('article_category', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('article_category');
    }
}
