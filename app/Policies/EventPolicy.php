<?php

namespace App\Policies;
use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    // metod policy before akan memberikan dtrue tanpa perlu mengecek method laon
    // sehinggan memberikan akses langsung ke method lainnya.
    // User di ambil dari auth yang sedang login
    // $abliti menyimpan metod mana yang nantinya jika adm ga bisa akses
    // cek platform adm, dan berikan akses semuanya
    // Platform Administrator boleh semua aksi Event
    public function before(User $user,string $ability): ?bool
    {
        if($user->hasRole('platform_administrator')){
            return true;
        }

        return null;
    }

    // Organizer dan Officer boleh membuka daftar Event saja
    public function viewAny(User $user): bool
    {
        return $user->hasRole('event_organizer')
            || $user->hasRole('event_officer');
    }

    // untuk lemihat detail event
    public function view(User $user,Event $event): bool
    {
        return $user->hasRole('event_organizer')
            && $event->user_id===$user->id;
    }


    // izin untuk create
    public function create(User $user): bool
    {
        return $user->hasRole('event_organizer');
    }

    // izin untuk update
    public function update(User $user, Event $event): bool
    {
        // ini akan mengembalikan nilai true jika kodisi di bawah terpenuhi
        return $user->hasRole('event_organizer')
        && $event->user_id===$user->id;
    }

    // izin untuk delete
    public function delete(User $user, Event $event): bool
    {
        return $user->hasRole('event_organizer')
        && $event->user_id===$user->id;
    }


    public function restore(User $user, Event $event): bool
    {
        return false;
    }


    public function forceDelete(User $user, Event $event): bool
    {
        return false;
    }
}
