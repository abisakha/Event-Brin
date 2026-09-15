<?php

namespace App\Services\Roles;

use App\Contracts\Roles\RoleRepositoryInterface;
use App\Contracts\Roles\RoleSyncServiceInterface;

class RoleSyncService implements RoleSyncServiceInterface
{
    public function __construct(
        protected RoleRepositoryInterface $roleRepository
    ) {}

    public function sync(): int
    {
        $rolesFromIntra = $this->fetchRolesFromIntra();

        $count = 0;

            foreach ($rolesFromIntra as $role) {
         $this->roleRepository->updateOrCreate(
            $role['name'],
            $role['role_intra'] ?? null
            );

             $count++;  
    }

        return $count;
    }

    /**
     * TODO: Ganti dengan HTTP call sesungguhnya ke Intra BRIN API
     * setelah akses API disetujui.
     */
    protected function fetchRolesFromIntra(): array
    {
        return [
            ['name' => 'platform_administrator', 'role_intra' => 'Platform Administrator'],
            ['name' => 'event_organizer', 'role_intra' => 'Event Organizer'],
            ['name' => 'event_officer', 'role_intra' => 'Event Officer'],
            ['name' => 'user', 'role_intra' => 'User'],
    ];
    }

}