<?php

namespace App\Policies;

use App\Models\User;

class AppointmentPolicy
{
    public function book(User $user): bool
    {
        return $user->role === 'Patient';
    }

    public function create(User $user): bool
    {
        return $user->role === 'Patient';
    }

    public function view(User $user): bool
    {
        return $user->role === 'Patient' || $user->role === "Admin" || $user->role === "Doctor";
    }
}
