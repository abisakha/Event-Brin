<?php

namespace App\Console\Commands;

use App\Contracts\Roles\RoleSyncServiceInterface;
use Illuminate\Console\Command;

class SyncRoleFromIntra extends Command
{
    protected $signature = 'role:sync-intra';

    protected $description = 'Sinkronisasi master role dari Intra BRIN API';

    public function handle(RoleSyncServiceInterface $roleSyncService): int
    {
        $this->info('Memulai sinkronisasi role dari Intra BRIN...');

        $count = $roleSyncService->sync();

        $this->info("Selesai. {$count} role berhasil disinkronkan.");

        return self::SUCCESS;
    }
}