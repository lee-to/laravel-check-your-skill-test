<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    public function task2()
    {
        // TODO Eloquent Задание 2: С помощью модели Item реализовать запрос в переменной products
        // select * from products where active = true order by created_at desc limit 3
        // вместо []
        $products = [];

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task3()
    {
        // TODO Eloquent Задание 3: Добавить в модель Item scope для фильтрации активных продуктов (scopeActive())
        // Одна строка кода
        // вместо []
        $products = [];

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task4($id)
    {
        // TODO Eloquent Задание 4: Найти Item по id и передать во view либо отдать 404 страницу
        // Одна строка кода
        // вместо []
        $product = [];

        return view('eloquent.task4', [
            'product' => $product
        ]);
    }

    public function task5(Request $request)
    {
        // TODO Eloquent Задание 5: В запросе будет все необходимое для создания записи
        // Выполнить простое добавление новой записи в Item на основе $request

        return redirect('/');
    }

    public function task6($id, Request $request)
    {
        $product = Item::findOrFail($id);
        // TODO Eloquent Задание 6: В запросе будет все необходимое для обновления записи
        // Выполнить простое обновление записи на основе $request

        return redirect('/');
    }

    public function task7(Request $request)
    {
        // TODO Eloquent Задание 7: В запросе будет параметр products который будет содержать массив с id
        // [1,2,3,4 ...] выполнить массовое удаление записей модели Item с учетом id в $request

        return redirect('/');
    }
}
