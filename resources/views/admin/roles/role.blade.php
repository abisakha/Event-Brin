@extends('admin.layouts.main')

@section('title','Role & Permission Management - BRIN Event Management')

@section('content')
@php
    // Dummy data sementara
    $users=[
        [
            'id'=>1,
            'name'=>'Holden Brakus',
            'email'=>'yazmin77@example.net',
            'deputi'=>'Deputi Kebijakan Riset dan Inovasi',
            'roles'=>['Platform Administrator','Event Organizer']
        ],
        [
            'id'=>2,
            'name'=>'Dr. Sri Hartini, M.T.',
            'email'=>'sri.hartini@brin.go.id',
            'deputi'=>'Deputi Sumber Daya Manusia IPTEK',
            'roles'=>['Event Officer']
        ],
        [
            'id'=>3,
            'name'=>'Ahmad Fauzi, M.Sc.',
            'email'=>'ahmad.fauzi@brin.go.id',
            'deputi'=>'Deputi Infrastruktur Riset dan Inovasi',
            'roles'=>['User']
        ],
        [
            'id'=>4,
            'name'=>'Siti Rahma, Ph.D. Siti Rahma, Ph.D. Siti Rahma, Ph.D.',
            'email'=>'siti.rahma@brin.go.id',
            'deputi'=>'Deputi Kebijakan Riset dan Inovasi',
            'roles'=>[]
        ]
    ];

    $roles=[
        'Platform Administrator',
        'Event Organizer',
        'Event Officer',
        'User'
    ];

    $deputies=collect($users)->pluck('deputi')->unique()->values();

    $totalUsers=count($users);
    $totalRoles=count($roles);
    $assignedUsers=collect($users)->filter(fn($user)=>count($user['roles'])>0)->count();
@endphp

<section class="p-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">
            Role & Permission Management
        </h1>

        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Manage user roles and access permissions for BRIN Event Management.
        </p>
    </div>

    {{-- Summary --}}
    <div class="mb-6 grid grid-cols-3 gap-4">

        {{-- Total Users --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">
                        Total Users
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">
                        {{ $totalUsers }}
                    </h2>
                </div>

                <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                    <i data-lucide="users" class="size-5"></i>
                </div>
            </div>
        </div>

        {{-- Available Roles --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">
                        Available Roles
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-violet-600 dark:text-violet-400">
                        {{ $totalRoles }}
                    </h2>
                </div>

                <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400">
                    <i data-lucide="shield-check" class="size-5"></i>
                </div>
            </div>
        </div>

        {{-- Assigned Users --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">
                        Assigned Users
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-emerald-600 dark:text-emerald-400">
                        {{ $assignedUsers }}
                    </h2>
                </div>

                <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <i data-lucide="user-check" class="size-5"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Information --}}
    <div class="mb-5 rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
        <div class="flex items-start gap-3">
            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                <i data-lucide="info" class="size-4"></i>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-slate-900 dark:text-white">
                    Role Assignment
                </h2>

                <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">
                    Assign one or multiple roles to users based on their responsibilities in the event management system.
                </p>
            </div>
        </div>
    </div>

    {{-- Search, Filter & Bulk Assign --}}
    <div class="mb-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="flex items-center gap-3">

            {{-- Search --}}
            <div class="relative min-w-64 flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-3 flex items-center">
                    <i data-lucide="search" class="size-4 text-slate-400"></i>
                </div>
                <input id="roleSearch"
                       type="text"
                       placeholder="Search user or email..."
                       class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-10 pe-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
            </div>

            {{-- Filter Deputi --}}
            <div class="relative min-w-64">
                <select id="deputiFilter"
                        class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                    <option value="">All Deputi</option>

                    @foreach($deputies as $deputi)
                        <option value="{{ strtolower($deputi) }}">
                            {{ $deputi }}
                        </option>
                    @endforeach
                </select>

                <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                    <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                </div>
            </div>

            {{-- Bulk Role --}}
            <div class="relative min-w-48">
                <select id="bulkRoleSelect"
                        class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                    <option value="">Select role</option>

                    @foreach($roles as $role)
                        <option value="{{ $role }}">
                            {{ $role }}
                        </option>
                    @endforeach
                </select>

                <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                    <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                </div>
            </div>

            {{-- Bulk Assign --}}
            <button id="bulkAssignButton"
                    type="button"
                    disabled
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95 disabled:cursor-not-allowed disabled:opacity-50">
                <i data-lucide="users-round" class="size-4"></i>
                <span>Assign Selected</span>
            </button>
        </div>

        <div id="selectedInfo" class="mt-3 hidden items-center gap-2 text-xs font-medium text-blue-600 dark:text-blue-400">
            <i data-lucide="check-square" class="size-4"></i>
            <span><span id="selectedCount">0</span> user selected</span>
        </div>
    </div>

    {{-- Role Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-5xl">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-left dark:border-slate-800 dark:bg-slate-950/40">

                        {{-- Select All --}}
                        <th class="w-12 p-4">
                            <input id="selectAllUsers"
                                   type="checkbox"
                                   class="size-4 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-800">
                        </th>

                        <th class="w-1/5 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">
                            User
                        </th>

                        <th class="w-1/4 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">
                            Email
                        </th>

                        <th class="w-1/3 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">
                            Current Role
                        </th>

                        <th class="w-1/4 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">
                            Assign New Role
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr data-user-row
                            data-name="{{ strtolower($user['name']) }}"
                            data-email="{{ strtolower($user['email']) }}"
                            data-deputi="{{ strtolower($user['deputi']) }}"
                            data-user-id="{{ $user['id'] }}"
                            class="border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">

                            {{-- Checkbox --}}
                            <td class="p-4">
                                <input type="checkbox"
                                       data-user-checkbox
                                       value="{{ $user['id'] }}"
                                       class="size-4 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-800">
                            </td>

                            {{-- User --}}
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                                        {{ strtoupper(substr($user['name'],0,1)) }}
                                    </div>

                                    <div class="min-w-0">
                                        <p class="max-w-52 truncate text-sm font-semibold text-slate-900 dark:text-white">
                                            {{ $user['name'] }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-400">
                                            User ID #{{ $user['id'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- Email --}}
                            <td class="p-4">
                                <div class="flex min-w-0 items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                                    <i data-lucide="mail" class="size-4 shrink-0"></i>

                                    <span class="max-w-64 truncate">
                                        {{ $user['email'] }}
                                    </span>
                                </div>
                            </td>

                            {{-- Current Roles --}}
                            <td class="p-4">
                                <div data-role-container class="flex flex-wrap gap-2">
                                    @forelse($user['roles'] as $role)
                                        @php
                                            $roleClass=match($role){
                                                'Platform Administrator'=>'bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400',
                                                'Event Organizer'=>'bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400',
                                                'Event Officer'=>'bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400',
                                                default=>'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300'
                                            };
                                        @endphp

                                        <span data-role-badge="{{ $role }}" class="inline-flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 text-xs font-semibold {{ $roleClass }}">
                                            <i data-lucide="shield" class="size-3.5"></i>

                                            <span>{{ $role }}</span>

                                            <button type="button" title="Remove Role" class="ml-0.5 flex size-4 items-center justify-center rounded-full transition hover:bg-black/10">
                                                <i data-lucide="x" class="size-3"></i>
                                            </button>

                                            {{--
                                            BACKEND LATER:

                                            <form action="{{ route('admin.roles.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="hidden" name="role_name" value="{{ $role }}">

                                                <button type="submit">
                                                    Remove Role
                                                </button>
                                            </form>
                                            --}}
                                        </span>
                                    @empty
                                        <span data-no-role class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-medium text-slate-400 dark:bg-slate-800">
                                            <i data-lucide="circle-minus" class="size-3.5"></i>
                                            No role assigned
                                        </span>
                                    @endforelse
                                </div>
                            </td>

                            {{-- Assign Role --}}
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    {{--
                                    BACKEND LATER:

                                    <form action="{{ route('admin.roles.store') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    --}}

                                    <div class="relative min-w-44 flex-1">
                                        <select class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                                            <option value="">Select role</option>

                                            @foreach($roles as $role)
                                                <option value="{{ $role }}">
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                                            <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                                        </div>
                                    </div>

                                    <button type="button" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                                        <i data-lucide="plus" class="size-4"></i>
                                        <span>Assign</span>
                                    </button>

                                    {{--
                                    </form>
                                    --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    {{-- Search Empty --}}
                    <tr id="noUserResult" class="hidden">
                        <td colspan="5" class="p-10 text-center">
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                <i data-lucide="search-x" class="size-5"></i>
                            </div>

                            <p class="mt-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                User not found
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Try another search or deputi filter.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{--
    BACKEND LATER:

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-emerald-100 p-3 text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    DATA ASLI:

    @foreach($users as $user)
        {{ $user->name }}
        {{ $user->email }}

        @forelse($user->roles as $role)
            {{ $role->role_intra ?? $role->name }}
        @empty
            Belum ada role
        @endforelse
    @endforeach
    --}}
</section>

@endsection
