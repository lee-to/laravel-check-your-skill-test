<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{IndexController, UserController, UserCrudController};
use App\Http\Controllers\Admin\IndexController as AdminIndexController;

//TODO Route Задание 1: По GET урлу /hello отобразить view - /resources/views/hello.blade (без контроллера)
Route::view('/hello', 'hello');

//TODO Route Задание 2: По GET урлу / обратиться к IndexController, метод index
Route::get('/', [IndexController::class, 'index']);

//TODO Route Задание 3: По GET урлу /page/contact отобразить view - /resources/views/pages/contact.blade
// с наименованием роута - contact
Route::view('/page/contact', 'pages.contact')->name('contact');

//TODO Route Задание 4: По GET урлу /users/[id] обратиться к UserController, метод show
// без Route Model Binding. Только параметр id
Route::get('/users/{id}', [UserController::class, 'show']);

//TODO Route Задание 5: По GET урлу /users/bind/[user] обратиться к UserController, метод showBind
// но в данном случае используем Route Model Binding. Параметр user
Route::get('/users/bind/{user}', [UserController::class, 'showBind']);

//TODO Route Задание 6: Выполнить редирект с урла /bad на урл /good
Route::permanentRedirect('/bad', '/good');


//TODO Route Задание 7: Добавить роут на ресурс контроллер - UserCrudController с урлом - /users_crud
Route::resource('/users_crud', UserCrudController::class);

//TODO Route Задание 8: Организовать группу роутов (Route::group()) объединенных префиксом - dashboard
Route::group(['prefix' => 'dashboard'], function () {
    // Задачи внутри группы роутов dashboard
    //TODO Route Задание 9: Добавить роут GET /admin -> Admin/IndexController -> index
    Route::get('/admin', [AdminIndexController::class, 'index']);

    //TODO Route Задание 10: Добавить роут POST /admin/post -> Admin/IndexController -> post
    Route::post('/admin/post', [AdminIndexController::class, 'post']);
});

//TODO Route Задание 11: Организовать группу роутов (Route::group()) объединенных префиксом - security и мидлваром auth
Route::group(['prefix' => 'security', 'middleware' => 'auth'], function () {
    // Задачи внутри группы роутов security
    //TODO Задание 12: Добавить роут GET /admin/auth -> Admin/IndexController -> auth
    Route::get('/admin/auth', [AdminIndexController::class, 'auth']);
});

require __DIR__ . '/default.php';
