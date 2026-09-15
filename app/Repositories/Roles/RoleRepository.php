<?php

namespace App\Repositories\Roles;

use App\Contracts\Roles\RoleRepositoryInterface;
use App\Models\MasterRole;
use Illuminate\Support\Collection;

class RoleRepository implements RoleRepositoryInterface
{
    public function updateOrCreate(string $name, ?string $roleIntra = null): MasterRole
    {
        return MasterRole::updateOrCreate(
            ['name' => $name],
            ['role_intra' => $roleIntra]
        );
    }

    public function all(): Collection
    {
        return MasterRole::all();
    }

    public function findByName(string $name): ?MasterRole
    {
        return MasterRole::where('name', $name)->first();
    }
}