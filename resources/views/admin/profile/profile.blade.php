@extends('admin.layouts.main')


@section('content')
{{-- @php
    $user=[
        'id'=>1,
        'username_intra'=>'abisakha.saif',
        'satker_id'=>12,
        'satker_name'=>'Deputi Bidang Riset dan Inovasi Daerah',
        'user_type'=>'Event Organizer',
        'name'=>'Abisakha Saif Alfath',
        'email'=>'abisakha.alfath@brin.go.id',
        'status'=>true
    ];
@endphp --}}

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">My Profile</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">View your personal information and notification preferences.</p>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <div class="xl:col-span-2">
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div class="border-b border-slate-200 p-4 sm:p-6 dark:border-slate-800">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                            <i data-lucide="user-round" class="size-5"></i>
                        </div>

                        <div>
                            <h2 class="font-bold text-slate-900 dark:text-white">Personal Information</h2>
                            <p class="mt-0.5 text-xs text-slate-400">Profile information synchronized from BRIN SSO.</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <div class="mb-7 flex flex-col items-center">
                        <div class="flex size-20 items-center justify-center rounded-full bg-blue-100 text-xl font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">

                            {{ strtoupper(substr($user->name,0,2)) }}
                        </div>

                        <h3 class="mt-3 text-base font-bold text-slate-900 dark:text-white">
                            {{ $user->name }}
                        </h3>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ $user->email }}
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <p class="mb-2 text-sm font-semibold text-slate-500 dark:text-slate-400">Full Name</p>

                            <div class="min-h-12 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">
                                    {{ $user['name'] }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <p class="mb-2 text-sm font-semibold text-slate-500 dark:text-slate-400">Email Address</p>

                            <div class="min-h-12 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                                <p class="break-all text-sm font-medium text-slate-800 dark:text-slate-200">
                                    {{ $user['email'] }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <p class="mb-2 text-sm font-semibold text-slate-500 dark:text-slate-400">Username Intra</p>

                            <div class="min-h-12 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">
                                    {{ $user['username_intra'] }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <p class="mb-2 text-sm font-semibold text-slate-500 dark:text-slate-400">User Type</p>

                            <div class="min-h-12 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">
                                    {{ $user['user_type'] }}
                                </p>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <p class="mb-2 text-sm font-semibold text-slate-500 dark:text-slate-400">Satker / Deputi</p>

                            <div class="flex min-h-12 items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                                <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                                    <i data-lucide="building-2" class="size-4"></i>
                                </div>

                                <p class="min-w-0 break-words text-sm font-medium text-slate-800 dark:text-slate-200">
                                    {{ $user['satker_name'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 border-t border-slate-200 pt-5 dark:border-slate-800">
                        <div class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between dark:border-slate-700 dark:bg-slate-800/60">
                            <div class="flex items-center gap-3">
                                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                                    <i data-lucide="circle-check-big" class="size-4"></i>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-800 dark:text-white">Account Status</p>
                                    <p class="mt-0.5 text-xs text-slate-400">Current status of your BRIN account.</p>
                                </div>
                            </div>

                            @if($user['status'])
                                <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-full bg-emerald-100 py-1.5 ps-3 pe-3 text-xs font-semibold text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                                    <span class="size-2 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-full bg-red-100 py-1.5 ps-3 pe-3 text-xs font-semibold text-red-600 dark:bg-red-950/60 dark:text-red-400">
                                    <span class="size-2 rounded-full bg-red-500"></span>
                                    Inactive
                                </span>
                            @endif
                        </div>
                    </div>

                    {{--
                    BACKEND LATER:
                    Data profile diambil dari BRIN SSO / users:

                    username_intra
                    satker_id
                    satker_name
                    user_type
                    name
                    email
                    status

                    Tidak ada update profile dari halaman ini.
                    --}}
                </div>
            </div>
        </div>

        <div>
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div class="border-b border-slate-200 p-4 sm:p-5 dark:border-slate-800">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                            <i data-lucide="bell" class="size-5"></i>
                        </div>

                        <div class="min-w-0">
                            <h2 class="font-bold text-slate-900 dark:text-white">Notification Preferences</h2>
                            <p class="mt-0.5 text-xs text-slate-400">Choose how you receive updates.</p>
                        </div>
                    </div>
                </div>

               <div class="p-4 sm:p-5">
                <div class="flex items-start gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60">
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-slate-800 dark:text-white">
                            Email Notifications
                        </p>

                        <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">
                            Receive event updates, registration alerts, and important reminders via email.
                        </p>
                    </div>

                    <label class="relative block h-6 w-11 shrink-0 cursor-pointer">
                        <input
                            type="checkbox"
                            name="email_notification"
                            checked
                            class="peer sr-only"
                        >

                        <span class="absolute inset-0 rounded-full bg-slate-300 transition peer-checked:bg-blue-600 dark:bg-slate-700 dark:peer-checked:bg-blue-600"></span>

                        <span class="absolute start-1 top-1 size-4 rounded-full bg-white shadow-sm transition-all peer-checked:start-auto peer-checked:end-1"></span>
                    </label>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
