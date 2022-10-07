<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('welcome', [
            'title' => 'Welcome',
            'users' => $users
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
