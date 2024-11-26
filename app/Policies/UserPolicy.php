<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view their own profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $profileUser
     * @return mixed
     */

    public function isAdmin(User $user)
    {
        return $user->role === 'Admin';
    }
    public function isDoctor(User $user)
    {
        return $user->role === 'Doctor';
    }

    public function isPatient(User $user, User $model)
    {
        return $user->role === 'Patient' && $user->id === $model->id;
    }
}
