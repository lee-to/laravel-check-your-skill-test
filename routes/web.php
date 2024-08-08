<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCrudController;
use Illuminate\Support\Facades\Route;

//TODO Route Задание 1: По GET урлу /hello отобразить view - /resources/views/hello.blade (без контроллера)
// Одна строка кода
Route::view('/hello', 'hello');


//TODO Route Задание 2: По GET урлу / обратиться к IndexController, метод index
// Одна строка кода
Route::get('/', [IndexController::class, 'index']);


//TODO Route Задание 3: По GET урлу /page/contact отобразить view - /resources/views/pages/contact.blade
// с наименованием роута - contact
// Одна строка кода
Route::view('/page/contact', 'pages/contact')->name('contact');

//TODO Route Задание 4: По GET урлу /users/[id] обратиться к UserController, метод show
// без Route Model Binding. Только параметр id
// Одна строка кода
Route::get('/users/{id}', [UserController::class, 'show']);

//TODO Route Задание 5: По GET урлу /users/bind/[user] обратиться к UserController, метод showBind
// но в данном случае используем Route Model Binding. Параметр user
// Одна строка кода
Route::get('/users/bind/{user}', [UserController::class, 'showBind']);

//TODO Route Задание 6: Выполнить редирект с урла /bad на урл /good
// Одна строка кода
Route::redirect('/bad', '/good');

//TODO Route Задание 7: Добавить роут на ресурс контроллер - UserCrudController с урлом - /users_crud
// Одна строка кода
Route::resource('/users_crud', UserCrudController::class);

//TODO Route Задание 8: Организовать группу роутов (Route::group()) объединенных префиксом - dashboard
Route::prefix('dashboard')->group(function () {
    // Задачи внутри группы роутов dashboard
    //TODO Route Задание 9: Добавить роут GET /admin -> Admin/IndexController -> index
    Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, 'index']);

    //TODO Route Задание 10: Добавить роут POST /admin/post -> Admin/IndexController -> post
    Route::post('/admin/post', [\App\Http\Controllers\Admin\IndexController::class, 'post']);
});

//TODO Route Задание 11: Организовать группу роутов (Route::group()) объединенных префиксом - security и мидлваром auth
Route::prefix('security')->middleware('auth')->group(function () {
    // Задачи внутри группы роутов security
    //TODO Задание 12: Добавить роут GET /admin/auth -> Admin/IndexController -> auth
    Route::get('/admin/auth', [\App\Http\Controllers\Admin\IndexController::class, 'auth']);
});

require __DIR__ . '/default.php';
