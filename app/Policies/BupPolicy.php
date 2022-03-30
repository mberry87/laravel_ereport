<?php

namespace App\Policies;

use App\Models\Bup;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bup  $bup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Bup $bup)
    {
        if ($user->id == $bup->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
