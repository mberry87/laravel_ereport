<?php

if (!function_exists('storeLog')) {
    function storeLog ($link, $message) {
        \App\Models\Notification::create([
            'link' => $link,
            'message' => $message,
            'is_read' => 0
        ]);

        return true;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin () {
        if (auth()->user()->role == 'admin') {
            return true;
        } else {
            abort(404);
        }
    }
}
