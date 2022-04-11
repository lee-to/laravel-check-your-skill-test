<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class HelloWorld extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $date = Carbon::now()->format('Y-m-d');

        return view('components.hello-world', compact('date'));
    }
}
