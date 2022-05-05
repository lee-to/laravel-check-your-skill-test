<?php

namespace App\Http\Controllers;

use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('welcome', [
            'title' => 'Welcome',
            // TODO Blade Задание 1: Передайте users во view (название ключа users)
            'users' => $users,
        ]);
    }

    public function table()
    {
        return view('table', [
            'data' => User::all(),
        ]);
    }

    public function auth()
    {
        return view('auth');
    }
}
