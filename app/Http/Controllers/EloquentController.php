<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function task2()
    {
        // TODO Eloquent Задание 2: С помощью модели Item реализовать запрос в переменной products
        // select * from products where active = true order by created_at desc limit 3
        // вместо []
        $products = Item::query()
            ->where('active', true)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task3()
    {
        // TODO Eloquent Задание 3: Добавить в модель Item scope для фильтрации активных продуктов (scopeActive())
        // Одна строка кода
        // вместо []
        $products = Item::active()->get();

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task4($id)
    {
        // TODO Eloquent Задание 4: Найти Item по id и передать во view либо отдать 404 страницу
        // Одна строка кода
        // вместо []
        $product = Item::findOrFail($id);

        return view('eloquent.task4', [
            'product' => $product
        ]);
    }

    public function task5(Request $request)
    {
        // TODO Eloquent Задание 5: В запросе будет все необходимое для создания записи
        // Выполнить простое добавление новой записи в Item на основе $request
        $product = $this->repository->create($request->all());

        return redirect('/');
    }

    public function task6($id, Request $request)
    {
        $product = Item::findOrFail($id);
        $product = $this->repository->update($product, $request->all());
        // TODO Eloquent Задание 6: В запросе будет все необходимое для обновления записи
        // Выполнить простое обновление записи на основе $request

        return redirect('/');
    }

    public function task7(Request $request)
    {
        // TODO Eloquent Задание 7: В запросе будет параметр products который будет содержать массив с id
        // [1,2,3,4 ...] выполнить массовое удаление записей модели Item с учетом id в $request
        $this->repository->deleteItems($request->all());

        return redirect('/');
    }
}
