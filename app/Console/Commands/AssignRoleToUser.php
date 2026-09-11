<?php

namespace App\Console\Commands;

use App\Contracts\Roles\RoleAssignmentServiceInterface;
use Illuminate\Console\Command;
use InvalidArgumentException;

class AssignRoleToUser extends Command
{
    protected $signature = 'role:assign {user_id} {role_name} {--revoke : Cabut role ini dari user, bukan assign}';

    protected $description = 'Assign atau cabut role ke user tertentu secara manual';

    public function handle(RoleAssignmentServiceInterface $roleAssignmentService): int
    {
        $userId = (int) $this->argument('user_id');
        $roleName = $this->argument('role_name');

        try {
            if ($this->option('revoke')) {
                $roleAssignmentService->revoke($userId, $roleName);
                $this->info("Role '{$roleName}' berhasil dicabut dari user ID {$userId}.");
            } else {
                $roleAssignmentService->assign($userId, $roleName);
                $this->info("Role '{$roleName}' berhasil di-assign ke user ID {$userId}.");
            }
        } catch (InvalidArgumentException $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}