<?php

namespace App\View\Components;

use App\Models\Pengaturan;
use Illuminate\View\Component;

class Title extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $pengaturan = Pengaturan::first();
        $this->name = $pengaturan->nama_sistem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.title');
    }
}
