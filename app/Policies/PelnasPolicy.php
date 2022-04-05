<?php

namespace App\Policies;

use App\Models\Pelnas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelnasPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pelnas  $pelnas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pelnas $pelnas)
    {
        if ($user->id == $pelnas->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
