<?php

namespace App\Policies;

use App\Models\Jpt;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JptPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Jpt  $jpt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Jpt $jpt)
    {
        if ($user->id == $jpt->id_user || $user->role == 'admin') {
            return true;
        }
    }
}
