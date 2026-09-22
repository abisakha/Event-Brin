<?php

namespace App\Contracts\Roles;

use App\Models\MasterRole;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    public function updateOrCreate(string $name, ?string $roleIntra = null): MasterRole;

    public function all(): Collection;

    public function findByName(string $name): ?MasterRole;
}