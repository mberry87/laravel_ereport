<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Notification extends Component
{
    public $notifications, $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $notifications = \App\Models\Notification::where('is_read', '0')->limit('5')->get();
        $this->notifications = $notifications;
        $this->count = \App\Models\Notification::where('is_read', '0')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.notification');
    }
}
