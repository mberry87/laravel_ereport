<?php

namespace App\View\Components\Backend;

use App\Models\User;
use Illuminate\View\Component;

class SideMenu extends Component
{

    public $userPermissions = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $userPermissions = User::findOrFail(auth()->user()->id);
        foreach($userPermissions->permissions as $permission) {
            array_push($this->userPermissions, $permission->name);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.side-menu');
    }
}
