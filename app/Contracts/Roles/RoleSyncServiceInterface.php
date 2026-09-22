<?php

namespace App\Contracts\Roles;

interface RoleSyncServiceInterface
{
    /**
     * Jalankan proses sinkronisasi role dari Intra BRIN.
     *
     * @return int Jumlah role yang berhasil disinkronkan.
     */
    public function sync(): int;
}