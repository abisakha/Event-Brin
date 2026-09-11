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
                $role['role_name'],
                $role['role_label'] ?? null
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
         ['role_name' => 'platform_administrator', 'role_label' => 'Platform Administrator'],
          ['role_name' => 'event_organizer', 'role_label' => 'Event Organizer'],
          ['role_name' => 'event_officer', 'role_label' => 'Event Officer'],
          ['role_name' => 'user', 'role_label' => 'User'],
        ];
    }
}