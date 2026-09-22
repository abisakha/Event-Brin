@extends('admin.layouts.main')

@section('title','Role & Permission Management - BRIN Event Management')

@section('content')
@php
    $totalUsers=$users->count();
    $totalRoles=$roles->count();
    $assignedUsers=$users->filter(fn($user)=>$user->roles->count()>0)->count();
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Role & Permission Management</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Manage user roles and access permissions for BRIN Event Management.</p>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700 dark:border-emerald-900 dark:bg-emerald-950/30 dark:text-emerald-400">
            <i data-lucide="circle-check" class="size-5"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-900 dark:bg-red-950/30 dark:text-red-400">
            <i data-lucide="circle-alert" class="size-5"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    {{-- Summary --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Users</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">{{ $totalUsers }}</h2>
                </div>
                <div class="flex size-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400"><i data-lucide="users" class="size-5"></i></div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Available Roles</p>
                    <h2 class="mt-3 text-3xl font-bold text-violet-600 dark:text-violet-400">{{ $totalRoles }}</h2>
                </div>
                <div class="flex size-10 items-center justify-center rounded-lg bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400"><i data-lucide="shield-check" class="size-5"></i></div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Assigned Users</p>
                    <h2 class="mt-3 text-3xl font-bold text-emerald-600 dark:text-emerald-400">{{ $assignedUsers }}</h2>
                </div>
                <div class="flex size-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400"><i data-lucide="user-check" class="size-5"></i></div>
            </div>
        </div>
    </div>

    {{-- Information --}}
    <div class="mb-5 rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
        <div class="flex items-start gap-3">
            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400"><i data-lucide="info" class="size-4"></i></div>
            <div>
                <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Role Assignment</h2>
                <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">Assign one or multiple roles to users based on their responsibilities in the event management system.</p>
            </div>
        </div>
    </div>

    {{-- Search, Role Filter, Bulk --}}
    <div class="relative z-20 mb-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center">

            {{-- Search + Suggestion --}}
            <div class="relative min-w-0 flex-1 lg:min-w-72">
                <i data-lucide="search" class="pointer-events-none absolute left-3 top-3 size-4 text-slate-400"></i>
                <input id="roleSearch" type="text" autocomplete="off" placeholder="Search user or email..." class="w-full rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-10 pe-9 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                <button id="clearSearch" type="button" class="absolute right-3 top-3 hidden text-slate-400 hover:text-slate-600"><i data-lucide="x" class="size-4"></i></button>

                <div id="searchSuggestions" class="absolute left-0 right-0 top-full z-50 mt-2 hidden max-h-72 overflow-y-auto rounded-xl border border-slate-200 bg-white p-1 shadow-xl dark:border-slate-700 dark:bg-slate-900">
                    @foreach($users as $user)
                        <button type="button" data-suggestion data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-value="{{ $user->name }}" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left transition hover:bg-slate-100 dark:hover:bg-slate-800">
                            <div class="flex size-9 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">{{ strtoupper(substr($user->name,0,1)) }}</div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-slate-800 dark:text-white">{{ $user->name }}</p>
                                <p class="truncate text-xs text-slate-400">{{ $user->email }}</p>
                            </div>
                        </button>
                    @endforeach
                    <div id="noSuggestion" class="hidden px-3 py-4 text-center text-sm text-slate-400">No suggestions found</div>
                </div>
            </div>

            {{-- Filter Role --}}
            <div class="relative w-full lg:w-56">
                <select id="roleFilter" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                    <option value="">All Roles</option>
                    <option value="no-role">No Role</option>
                    @foreach($roles as $role)
                        <option value="{{ strtolower($role->name) }}">{{ $role->role_intra??$role->name }}</option>
                    @endforeach
                </select>
                <i data-lucide="chevron-down" class="pointer-events-none absolute right-3 top-3 size-4 text-slate-400"></i>
            </div>

            {{-- Bulk Role --}}
            <div class="relative w-full lg:w-56">
                <select id="bulkRoleSelect" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" data-label="{{ $role->role_intra??$role->name }}">{{ $role->role_intra??$role->name }}</option>
                    @endforeach
                </select>
                <i data-lucide="chevron-down" class="pointer-events-none absolute right-3 top-3 size-4 text-slate-400"></i>
            </div>

            <button id="bulkAssignButton" type="button" disabled class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50">
                <i data-lucide="users-round" class="size-4"></i>
                <span>Assign Selected</span>
            </button>
        </div>

        <div id="selectedInfo" class="mt-3 hidden items-center gap-2 text-xs font-medium text-blue-600 dark:text-blue-400">
            <i data-lucide="check-square" class="size-4"></i>
            <span><span id="selectedCount">0</span> user selected</span>
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-5xl">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-left dark:border-slate-800 dark:bg-slate-950/40">
                        <th class="w-12 p-4"><input id="selectAllUsers" type="checkbox" class="size-4 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-800"></th>
                        <th class="w-1/5 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500">User</th>
                        <th class="w-1/4 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Email</th>
                        <th class="w-1/3 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Current Role</th>
                        <th class="w-1/4 p-4 text-xs font-semibold uppercase tracking-wide text-slate-500">Assign New Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        @php
                            $roleNames=$user->roles->pluck('name')->map(fn($role)=>strtolower($role))->implode('|');
                        @endphp

                        <tr data-user-row data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}" data-roles="{{ $roleNames }}" class="border-b border-slate-200 transition last:border-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="p-4"><input type="checkbox" data-user-checkbox value="{{ $user->id }}" class="size-4 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-800"></td>

                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">{{ strtoupper(substr($user->name,0,1)) }}</div>
                                    <div class="min-w-0">
                                        <p class="max-w-52 truncate text-sm font-semibold text-slate-900 dark:text-white">{{ $user->name }}</p>
                                        <p class="mt-0.5 text-xs text-slate-400">User ID #{{ $user->id }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                                    <i data-lucide="mail" class="size-4 shrink-0"></i>
                                    <span class="max-w-64 truncate">{{ $user->email }}</span>
                                </div>
                            </td>

                            <td class="p-4">
                                <div data-role-container class="flex flex-wrap gap-2">
                                    @forelse($user->roles as $role)
                                        @php
                                            $roleLabel=$role->role_intra??$role->name;
                                            $roleClass=match(strtolower($role->name)){
                                                'platform administrator'=>'bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400',
                                                'organizer','event organizer'=>'bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400',
                                                'event officer'=>'bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400',
                                                'participant'=>'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300',
                                                default=>'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300'
                                            };
                                        @endphp

                                        <span class="inline-flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 text-xs font-semibold {{ $roleClass }}">
                                            <i data-lucide="shield" class="size-3.5"></i>
                                            <span>{{ $roleLabel }}</span>

                                            <form action="{{ route('admin.roles.destroy') }}" method="POST" data-remove-role-form data-user-name="{{ $user->name }}" data-role-name="{{ $roleLabel }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="hidden" name="role_name" value="{{ $role->name }}">
                                                <button type="submit" title="Remove Role" class="ml-0.5 flex size-4 items-center justify-center rounded-full transition hover:bg-black/10"><i data-lucide="x" class="size-3"></i></button>
                                            </form>
                                        </span>
                                    @empty
                                        <span class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-medium text-slate-400 dark:bg-slate-800">
                                            <i data-lucide="circle-minus" class="size-3.5"></i>
                                            No role assigned
                                        </span>
                                    @endforelse
                                </div>
                            </td>

                            <td class="p-4">
                                <form action="{{ route('admin.roles.store') }}" method="POST" data-assign-role-form data-user-name="{{ $user->name }}" class="flex items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    <div class="relative min-w-44 flex-1">
                                        <select name="role_name" required data-role-select class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-9 text-sm text-slate-600 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                                            <option value="">Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" data-label="{{ $role->role_intra??$role->name }}">{{ $role->role_intra??$role->name }}</option>
                                            @endforeach
                                        </select>
                                        <i data-lucide="chevron-down" class="pointer-events-none absolute right-3 top-3 size-4 text-slate-400"></i>
                                    </div>

                                    <button type="submit" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 active:scale-95">
                                        <i data-lucide="plus" class="size-4"></i>
                                        <span>Assign</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="noUserResult" class="hidden">
                        <td colspan="5" class="p-10 text-center">
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800"><i data-lucide="search-x" class="size-5"></i></div>
                            <p class="mt-3 text-sm font-semibold text-slate-700 dark:text-slate-300">User not found</p>
                            <p class="mt-1 text-xs text-slate-400">Try another search or role filter.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- Modal --}}
<div id="roleConfirmModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl dark:bg-slate-900">
        <div id="modalIcon" class="mb-4 flex size-12 items-center justify-center rounded-full bg-blue-100 text-blue-600"><i data-lucide="shield-check" class="size-6"></i></div>
        <h3 id="modalTitle" class="text-lg font-bold text-slate-900 dark:text-white">Confirm Role</h3>
        <p id="modalMessage" class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400"></p>
        <div class="mt-6 flex justify-end gap-3">
            <button id="modalCancel" type="button" class="rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800">Cancel</button>
            <button id="modalConfirm" type="button" class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">Confirm</button>
        </div>
    </div>
</div>

@endsection
