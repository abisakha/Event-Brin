<?php

namespace App\Services\Roles;

use App\Contracts\Roles\RoleAssignmentServiceInterface;
use App\Contracts\Roles\RoleRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;
use InvalidArgumentException;


class RoleAssignmentService implements RoleAssignmentServiceInterface
{
    public function __construct(
        protected RoleRepositoryInterface $roleRepository
    ) {}

    public function assign(int $userId, string $roleName): void
    {
        $role = $this->roleRepository->findByName($roleName);

        if (! $role) {
            throw new InvalidArgumentException("Role '{$roleName}' tidak ditemukan.");
        }

        $role->users()->syncWithoutDetaching([$userId]);
    }

    public function revoke(int $userId, string $roleName): void
    {
        $role = $this->roleRepository->findByName($roleName);

        if (! $role) {
            throw new InvalidArgumentException("Role '{$roleName}' tidak ditemukan.");
        }

        $role->users()->detach($userId);
    }

    public function allUsersWithRoles(): Collection
    {
        return User::with('roles')->get();
    }

    public function allRoles(): Collection
    {
        return $this->roleRepository->all();
    }
}