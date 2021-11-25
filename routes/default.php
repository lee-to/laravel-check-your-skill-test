<?php

use Illuminate\Support\Facades\Route;

Route::view('/login', 'login')->name('login');

Route::get('/table', [\App\Http\Controllers\IndexController::class, 'table'])->name('table');

Route::get('/auth', [\App\Http\Controllers\IndexController::class, 'auth'])->name('default.auth');

Route::get('/eloquent/task2', [\App\Http\Controllers\EloquentController::class, 'task2'])->name('eloquent.task2');
Route::get('/eloquent/task3', [\App\Http\Controllers\EloquentController::class, 'task3'])->name('eloquent.task3');
Route::get('/eloquent/task4/{id}', [\App\Http\Controllers\EloquentController::class, 'task4'])->name('eloquent.task4');

Route::post('/eloquent/task5', [\App\Http\Controllers\EloquentController::class, 'task5'])->name('eloquent.task5');
Route::post('/eloquent/task6/{id}', [\App\Http\Controllers\EloquentController::class, 'task6'])->name('eloquent.task6');
Route::delete('/eloquent/task7', [\App\Http\Controllers\EloquentController::class, 'task7'])->name('eloquent.task7');


Route::resource('items', \App\Http\Controllers\ItemController::class);