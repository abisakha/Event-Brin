<?php

namespace App\Policies;

use App\Models\MasterRole;
use App\Models\User;

class MasterRolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('platform_administrator');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('platform_administrator');
    }

    public function delete(User $user, MasterRole $masterRole): bool
    {
        return $user->hasRole('platform_administrator');
    }
}