<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pelra;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelraPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Pelra $pelra)
    {
        if ($user->id == $pelra->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
