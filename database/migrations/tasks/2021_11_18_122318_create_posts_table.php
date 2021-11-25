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
        //TODO Migrations Задание 1: Создать таблицу categories с 2 полями id и title (не забыть про timestamps)
        //

        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //TODO Migrations Задание 2: Для title указать что значение по умолчанию NULL

            //TODO Migrations Задание 3: Для active указать что значение по умолчанию TRUE

            //TODO Migrations Задание 4: Добавить функционал soft delete

            //TODO Migrations Задание 5: Добавить поля с timestamps (created_at, updated_at) через 1 метод
        });

        Schema::table('posts', function (Blueprint $table) {
            //TODO Migrations Задание 6: Добавить поле description типа text (DEFAULT NULL) ПОСЛЕ поля title

            //TODO Migrations Задание 7: Сделать провеку на наличие поля active и в случаи успеха добавить поле main (boolean default false)

            //TODO Migrations Задание 8: Переименовать поле title в name
        });

        //TODO Migrations Задание 9: Переименовать таблицу posts в articles

        //TODO Migrations Задание 10: Добавить таблицу для связи articles и categories (belongsToMany) c foreign ключами
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // TODO Migrations Задание 11: Удалить таблицы categories, articles, article_category если такие существуют
    }
}
