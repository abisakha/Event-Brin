<?php

namespace App\Contracts\Roles;

use App\Models\MasterRole;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    public function updateOrCreate(string $roleName, ?string $roleLabel = null): MasterRole;

    public function all(): Collection;

    public function findByName(string $roleName): ?MasterRole;
}