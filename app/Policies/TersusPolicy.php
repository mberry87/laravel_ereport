<?php

namespace App\Policies;

use App\Models\Tersus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TersusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tersus  $tersus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Tersus $tersus)
    {
        if ($user->id == $tersus->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
