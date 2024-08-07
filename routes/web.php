<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCrudController;
use Illuminate\Support\Facades\Route;

Route::view('/hello', 'hello');

Route::get('/', [IndexController::class, 'index']);

Route::view('/page/contact', 'pages/contact')->name('contact');

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/users/bind/{user}', [UserController::class, 'showBind']);

Route::redirect('/bad', '/good');

Route::resource('/users_crud', UserCrudController::class);

Route::prefix('dashboard')->group(function () {
    Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, 'index']);

    Route::post('/admin/post', [\App\Http\Controllers\Admin\IndexController::class, 'post']);
});

Route::prefix('security')->middleware('auth')->group(function () {
    Route::get('/admin/auth', [\App\Http\Controllers\Admin\IndexController::class, 'auth']);
});

require __DIR__ . '/default.php';
