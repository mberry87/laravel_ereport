<?php

namespace App\Policies;

use App\Models\KeagenanKapal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeagenanKapalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KeagenanKapal  $keagenanKapal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KeagenanKapal $keagenanKapal)
    {
        if ($user->id == $keagenanKapal->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
