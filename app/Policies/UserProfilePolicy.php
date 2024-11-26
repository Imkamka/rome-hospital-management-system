<?php

namespace App\Policies;

use App\Models\User;

class UserProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewProfile(User $user)
    {
    }
}
