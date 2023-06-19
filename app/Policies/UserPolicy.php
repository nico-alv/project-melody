<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewUserDashboard(User $user)
    {
        return $user->role === 'Usuario';
    }

    public function viewAdminDashboard(User $user)
    {
        return $user->role === 'Administrador';
    }
}
