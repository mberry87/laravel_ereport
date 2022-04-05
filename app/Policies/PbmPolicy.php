<?php

namespace App\Policies;

use App\Models\Pbm;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PbmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pbm  $pbm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pbm $pbm)
    {
        if ($user->id == $pbm->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
