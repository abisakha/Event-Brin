@extends('admin.layouts.main')

@section('title','Registrations - BRIN Event Management')

@section('content')
{{-- data dummy --}}
@php
    $registrations=[
        ['id'=>1,'name'=>'Prof. Dr. Ir. Bambang Subiyanto','email'=>'bambang.subiyanto@brin.go.id','organization'=>'Research Center for Physics — BRIN','date'=>'Oct 02, 2026 10:14 AM','status'=>'Confirmed'],
        ['id'=>2,'name'=>'Dr. Sri Hartini','email'=>'sri.hartini@brin.go.id','organization'=>'Electronics and Informatics Institute','date'=>'Oct 03, 2026 09:20 AM','status'=>'Confirmed'],
        ['id'=>3,'name'=>'Yudi Suryadi','email'=>'yudi.suryadi@brin.go.id','organization'=>'Space Engineering Lab','date'=>'Oct 04, 2026 11:30 AM','status'=>'Pending'],
        ['id'=>4,'name'=>'Siti Rahma','email'=>'siti.rahma@brin.go.id','organization'=>'Maritime Technology Center','date'=>'Oct 04, 2026 01:15 PM','status'=>'Confirmed'],
        ['id'=>5,'name'=>'Dr. Ir. Agus Rahmat','email'=>'agus.rahmat@brin.go.id','organization'=>'Center for Limnology','date'=>'Oct 05, 2026 08:45 AM','status'=>'Cancelled'],
        ['id'=>6,'name'=>'Prof. Megawati Wijaya','email'=>'megawati.wijaya@brin.go.id','organization'=>'Oceanography Department','date'=>'Oct 05, 2026 10:05 AM','status'=>'Confirmed'],
        ['id'=>7,'name'=>'Ahmad Fauzi','email'=>'ahmad.fauzi@brin.go.id','organization'=>'Biotechnology Research Center','date'=>'Oct 06, 2026 09:10 AM','status'=>'Pending'],
        ['id'=>8,'name'=>'Dr. Dewi Lestari','email'=>'dewi.lestari@brin.go.id','organization'=>'Meteorology and Climatology Lab','date'=>'Oct 06, 2026 02:40 PM','status'=>'Confirmed'],
        ['id'=>9,'name'=>'Hendra Wijaya','email'=>'hendra.wijaya@brin.go.id','organization'=>'Advanced Materials Institute','date'=>'Oct 07, 2026 08:30 AM','status'=>'Confirmed'],
        ['id'=>10,'name'=>'Ir. Rian Ekasari','email'=>'rian.ekasari@brin.go.id','organization'=>'Nuclear Science Center','date'=>'Oct 07, 2026 11:20 AM','status'=>'Cancelled']
    ];
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">Registrations</h1>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">National Research Innovation Summit 2026 — Participant Registration Database</p>
        </div>

        <button id="openRegistrationForm" type="button" class="inline-flex w-fit items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95">
            <i data-lucide="user-plus" class="size-4"></i>
            <span>Add Registration</span>
        </button>
    </div>

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <form id="registrationFilterForm" class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-1 flex-col gap-3 sm:flex-row sm:flex-wrap">
                <div class="flex min-w-0 flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-3 transition focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 sm:max-w-sm">
                    <i data-lucide="search" class="size-4 shrink-0 text-slate-400"></i>

                    <input id="registrationSearch" type="search" placeholder="Search participant name or email..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">

                    {{--
                    BACKEND LATER:
                    name="search"
                    value="{{ request('search') }}"
                    --}}
                </div>

                <div class="relative">
                    <select id="registrationStatusFilter" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-10 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:w-auto">
                        <option value="all">Status: All</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                        <option value="cancelled">Cancelled</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                        <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                    </div>
                </div>

                <div class="relative">
                    <select id="registrationOrganizationFilter" class="w-full truncate appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-10 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:w-64">
                        <option value="all">Organization: All BRIN Center</option>
                        <option value="physics">Research Center for Physics</option>
                        <option value="informatics">Electronics and Informatics Institute</option>
                        <option value="space">Space Engineering Lab</option>
                        <option value="maritime">Maritime Technology Center</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                        <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                    </div>
                </div>

                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 active:scale-95">
                    <i data-lucide="filter" class="size-4"></i>
                    <span>Apply</span>
                </button>

                <button id="resetRegistrationFilter" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-500 transition hover:bg-slate-50 hover:text-slate-900 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                    <i data-lucide="rotate-ccw" class="size-4"></i>
                    <span>Reset</span>
                </button>
            </div>

            <a href="#" class="inline-flex items-center justify-center gap-2 rounded-lg border border-blue-500 py-2.5 ps-4 pe-4 text-sm font-semibold text-blue-600 transition hover:bg-blue-50 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/40">
                <i data-lucide="download" class="size-4"></i>
                <span>Export CSV</span>
            </a>
        </form>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-left dark:border-slate-800 dark:bg-slate-950/40">
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Full Name</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Email Address</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Organization / Institute</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Registration Date</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Status</th>
                        <th class="p-4 text-center text-xs font-semibold text-slate-500 dark:text-slate-400">Actions</th>
                    </tr>
                </thead>

                <tbody id="registrationTableBody">
                    @foreach($registrations as $registration)
                        @php $status=strtolower($registration['status']); @endphp

                        <tr
                            data-registration-item
                            data-registration-id="{{ $registration['id'] }}"
                            data-registration-name="{{ $registration['name'] }}"
                            data-registration-email="{{ $registration['email'] }}"
                            data-registration-organization="{{ $registration['organization'] }}"
                            data-registration-date="{{ $registration['date'] }}"
                            data-registration-status="{{ $status }}"
                            class="group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60"
                        >
                            <td class="max-w-48 p-4">
                                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                    {{ $registration['name'] }}
                                </p>
                            </td>

                            <td class="max-w-56 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                                    {{ $registration['email'] }}
                                </p>
                            </td>

                            <td class="max-w-64 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                                    {{ $registration['organization'] }}
                                </p>
                            </td>

                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                                {{ $registration['date'] }}
                            </td>

                            <td class="p-4">
                                @if($status==='confirmed')
                                    <span class="rounded-full bg-sky-100 py-1 ps-3 pe-3 text-xs font-medium text-sky-600 dark:bg-sky-950/60 dark:text-sky-400">Confirmed</span>
                                @elseif($status==='pending')
                                    <span class="rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">Pending</span>
                                @else
                                    <span class="rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-red-400 dark:bg-slate-800 dark:text-slate-400">Cancelled</span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center gap-1">
                                    <button type="button" data-registration-detail="{{ $registration['id'] }}" title="View Detail" class="flex size-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                                        <i data-lucide="eye" class="size-4"></i>
                                    </button>

                                    <button type="button" data-registration-edit="{{ $registration['id'] }}" title="Edit Registration" class="flex size-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                                        <i data-lucide="square-pen" class="size-4"></i>
                                    </button>

                                    <button type="button" data-registration-delete="{{ $registration['id'] }}" title="Delete Registration" class="flex size-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:text-red-400 dark:hover:bg-red-950/40">
                                        <i data-lucide="trash-2" class="size-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="registrationEmptyDesktop" class="hidden">
                        <td colspan="6" class="p-10 text-center">
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                <i data-lucide="users-x" class="size-5"></i>
                            </div>

                            <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No registrations found</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant, status, or organization.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="registrationMobileList" class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @foreach($registrations as $registration)
                @php $status=strtolower($registration['status']); @endphp

                <article
                    data-registration-item
                    data-registration-id="{{ $registration['id'] }}"
                    data-registration-name="{{ $registration['name'] }}"
                    data-registration-email="{{ $registration['email'] }}"
                    data-registration-organization="{{ $registration['organization'] }}"
                    data-registration-date="{{ $registration['date'] }}"
                    data-registration-status="{{ $status }}"
                    class="p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60"
                >
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h2 class="truncate font-semibold text-slate-900 dark:text-white">
                                {{ $registration['name'] }}
                            </h2>

                            <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">
                                {{ $registration['email'] }}
                            </p>
                        </div>

                        @if($status==='confirmed')
                            <span class="shrink-0 rounded-full bg-sky-100 py-1 ps-3 pe-3 text-xs font-medium text-sky-600 dark:bg-sky-950/60 dark:text-sky-400">Confirmed</span>
                        @elseif($status==='pending')
                            <span class="shrink-0 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">Pending</span>
                        @else
                            <span class="shrink-0 rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-slate-500 dark:bg-slate-800 dark:text-slate-400">Cancelled</span>
                        @endif
                    </div>

                    <div class="mt-4 space-y-2 text-sm text-slate-500 dark:text-slate-400">
                        <div class="flex items-start gap-2">
                            <i data-lucide="building-2" class="mt-0.5 size-4 shrink-0"></i>
                            <span>{{ $registration['organization'] }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <i data-lucide="calendar-days" class="size-4 shrink-0"></i>
                            <span>{{ $registration['date'] }}</span>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                        <button type="button" data-registration-detail="{{ $registration['id'] }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-100 py-2 ps-3 pe-3 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 active:scale-95 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
                            <i data-lucide="eye" class="size-4"></i>
                            <span>View</span>
                        </button>

                        <button type="button" data-registration-edit="{{ $registration['id'] }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                            <i data-lucide="square-pen" class="size-4"></i>
                            <span>Edit</span>
                        </button>

                        <button type="button" data-registration-delete="{{ $registration['id'] }}" class="inline-flex items-center gap-2 rounded-lg bg-red-50 py-2 ps-3 pe-3 text-xs font-semibold text-red-500 transition hover:bg-red-100 hover:text-red-600 active:scale-95 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">
                            <i data-lucide="trash-2" class="size-4"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </article>
            @endforeach

            <div id="registrationEmptyMobile" class="hidden p-10 text-center">
                <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                    <i data-lucide="users-x" class="size-5"></i>
                </div>

                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No registrations found</h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant, status, or organization.</p>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-col gap-4 text-sm sm:flex-row sm:items-center sm:justify-between">
        <p class="text-slate-500 dark:text-slate-400">
            Showing <span id="registrationVisibleCount">{{ count($registrations) }}</span> of
            <span id="registrationTotalCount">128</span> registered personnel.
        </p>

        <nav class="flex flex-wrap items-center gap-1">
            <a href="#" class="rounded-lg border border-slate-200 py-2 ps-3 pe-3 text-xs text-slate-500 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800">Previous</a>
            <a href="#" class="rounded-lg bg-blue-600 py-2 ps-3 pe-3 text-xs font-semibold text-white">1</a>
            <a href="#" class="rounded-lg border border-slate-200 py-2 ps-3 pe-3 text-xs text-slate-500 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800">2</a>
            <a href="#" class="rounded-lg border border-slate-200 py-2 ps-3 pe-3 text-xs text-slate-500 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800">3</a>
            <span class="px-2 text-slate-400">...</span>
            <a href="#" class="rounded-lg border border-slate-200 py-2 ps-3 pe-3 text-xs text-slate-500 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800">13</a>
            <a href="#" class="rounded-lg border border-slate-200 py-2 ps-3 pe-3 text-xs text-slate-500 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800">Next</a>
        </nav>
    </div>
</section>

{{-- CREATE / UPDATE REGISTRATION --}}
<div id="registrationFormModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-screen w-full max-w-xl flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
        <div class="flex items-start justify-between gap-4 border-b border-slate-100 p-5 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <div id="registrationFormIcon" class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                    <i data-lucide="user-plus" class="size-5"></i>
                </div>

                <div>
                    <h2 id="registrationFormTitle" class="text-lg font-bold text-slate-900 dark:text-white">Add Registration</h2>
                    <p id="registrationFormDescription" class="mt-0.5 text-xs text-slate-400">Add participant registration manually.</p>
                </div>
            </div>

            <button id="closeRegistrationForm" type="button" class="flex size-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form id="registrationForm" class="overflow-y-auto">
            <div class="space-y-5 p-5">
                <div>
                    <label for="registrationName" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Full Name <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:bg-slate-800">
                        <i data-lucide="user" class="size-4 shrink-0 text-slate-400"></i>
                        <input id="registrationName" type="text" required placeholder="Participant full name" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div>
                    <label for="registrationEmail" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Email Address <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:bg-slate-800">
                        <i data-lucide="mail" class="size-4 shrink-0 text-slate-400"></i>
                        <input id="registrationEmail" type="email" required placeholder="participant@brin.go.id" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div>
                    <label for="registrationOrganization" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Organization / Institute <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:bg-slate-800">
                        <i data-lucide="building-2" class="size-4 shrink-0 text-slate-400"></i>
                        <input id="registrationOrganization" type="text" required placeholder="Organization or institute" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="registrationDate" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                            Registration Date <span class="text-red-500">*</span>
                        </label>

                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800">
                            <i data-lucide="calendar-clock" class="size-4 shrink-0 text-slate-400"></i>

                            <input id="registrationDate" type="datetime-local" required class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none dark:text-slate-200">
                        </div>
                    </div>

                    <div>
                        <label for="registrationStatus" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                            Status <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <select id="registrationStatus" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 p-3 pe-10 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                <option value="Confirmed">Confirmed</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>

                            <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                                <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
                    <div class="flex items-start gap-3">
                        <i data-lucide="info" class="mt-0.5 size-4 shrink-0 text-blue-500"></i>

                        <p class="text-xs leading-5 text-slate-500 dark:text-slate-400">
                            Registration changes currently apply to the interface only. Backend integration will be connected later.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-2 border-t border-slate-100 p-5 sm:flex-row sm:justify-end dark:border-slate-800">
                <button id="cancelRegistrationForm" type="button" class="rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                    <i id="registrationSubmitIcon" data-lucide="user-plus" class="size-4"></i>
                    <span id="registrationSubmitText">Add Registration</span>
                </button>

                {{--
                BACKEND LATER:

                CREATE:
                POST /admin/registrations

                UPDATE:
                PUT/PATCH /admin/registrations/{id}
                --}}
            </div>
        </form>
    </div>
</div>

{{-- DETAIL REGISTRATION --}}
<div id="registrationModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-lg rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
        <div class="flex items-center justify-between border-b border-slate-100 p-5 dark:border-slate-800">
            <div>
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Registration Detail</h2>
                <p class="mt-0.5 text-xs text-slate-400">Participant registration information</p>
            </div>

            <button id="closeRegistrationModal" type="button" class="flex size-9 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <div class="space-y-5 p-5">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60">
                <p class="mb-4 text-xs font-bold uppercase tracking-wide text-blue-600 dark:text-blue-400">Participant Profile</p>

                <dl class="space-y-3 text-sm">
                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Full Name</dt>
                        <dd id="modalName" class="col-span-2 font-semibold text-slate-900 dark:text-white"></dd>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Email Address</dt>
                        <dd id="modalEmail" class="col-span-2 break-all text-slate-700 dark:text-slate-300"></dd>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Organization</dt>
                        <dd id="modalOrganization" class="col-span-2 text-slate-700 dark:text-slate-300"></dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60">
                <p class="mb-4 text-xs font-bold uppercase tracking-wide text-blue-600 dark:text-blue-400">Registration Info</p>

                <dl class="space-y-3 text-sm">
                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Event Name</dt>
                        <dd class="col-span-2 font-medium text-slate-900 dark:text-white">National Research Innovation Summit 2026</dd>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Registered Date</dt>
                        <dd id="modalDate" class="col-span-2 text-slate-700 dark:text-slate-300"></dd>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <dt class="text-slate-500 dark:text-slate-400">Current Status</dt>

                        <dd class="col-span-2">
                            <span id="modalStatus" class="inline-flex rounded-md py-1 ps-2 pe-2 text-xs font-medium"></span>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-100 p-5 sm:flex-row sm:justify-end dark:border-slate-800">
            <button id="cancelRegistrationBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-red-950/40 dark:hover:text-red-400">
                Cancel Registration
            </button>

            <button id="confirmTicketBtn" type="button" class="inline-flex items-center justify-center rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-lg active:scale-95">
                Confirm Registration
            </button>
        </div>
    </div>
</div>

{{-- DELETE REGISTRATION --}}
<div id="deleteRegistrationModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
        <div class="p-6 text-center">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-red-100 text-red-500 dark:bg-red-950/50 dark:text-red-400">
                <i data-lucide="trash-2" class="size-6"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">Delete Registration?</h2>

            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                Are you sure you want to delete registration for
                <span id="deleteRegistrationName" class="font-semibold text-slate-700 dark:text-slate-200"></span>?
                This action cannot be undone.
            </p>

            <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
                <button id="cancelDeleteRegistration" type="button" class="rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button id="confirmDeleteRegistration" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-500 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete Registration</span>
                </button>

                {{--
                BACKEND LATER:
                DELETE /admin/registrations/{id}
                --}}
            </div>
        </div>
    </div>
</div>
@endsection
