<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function post()
    {
        return view('welcome');
    }

    public function auth()
    {
        return view('welcome');
    }
}
