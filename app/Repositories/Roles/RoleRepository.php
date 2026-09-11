<?php

namespace App\Repositories\Roles;

use App\Contracts\Roles\RoleRepositoryInterface;
use App\Models\MasterRole;
use Illuminate\Support\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    public function updateOrCreate(string $roleName, ?string $roleLabel = null): MasterRole
    {
        return MasterRole::updateOrCreate(
            ['role_name' => $roleName],
            ['role_label' => $roleLabel]
        );
    }

    public function all(): Collection
    {
        return MasterRole::all();
    }

    public function findByName(string $roleName): ?MasterRole
    {
        return MasterRole::where('role_name', $roleName)->first();
    }
}