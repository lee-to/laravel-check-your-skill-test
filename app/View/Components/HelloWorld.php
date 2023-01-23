<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

final class HelloWorld extends Component
{
    public function render()
    {
        return view('hello');
    }
}
