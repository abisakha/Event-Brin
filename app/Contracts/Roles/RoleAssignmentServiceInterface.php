<?php

namespace App\Contracts\Roles;

use Illuminate\Support\Collection;

interface RoleAssignmentServiceInterface
{
    public function assign(int $userId, string $roleName): void;

    public function revoke(int $userId, string $roleName): void;

    public function allUsersWithRoles(): Collection;

    public function allRoles(): Collection;
}