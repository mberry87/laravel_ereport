<?php

namespace App\View\Components;

use App\Models\Pengaturan;
use Illuminate\View\Component;

class Favico extends Component
{
    public $logo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $pengaturan = Pengaturan::first();
        $this->logo = $pengaturan->logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favico');
    }
}
