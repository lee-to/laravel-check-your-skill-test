<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    // TODO Route Задача 13: Добавить apiResource контроллер - Api/V1/UserController.
    // Префикс урла должен быть /api/v1
    // Полный урл /api/v1/users (не забывайте что это api routes)
    // Одна строка кода
});
