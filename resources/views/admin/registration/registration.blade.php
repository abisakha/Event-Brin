@extends('admin.layouts.main')

@section('title','Registrations - BRIN Event Management')

@section('content')
{{-- data dummy --}}
@php
    $registrations=[
        ['id'=>1,'name'=>'Prof. Dr. Ir. Bambang Subiyanto ','email'=>'bambang.subiyanto@brin.go.id','organization'=>'Research Center for Physics — BRIN','date'=>'Oct 02, 2026 10:14 AM','status'=>'Confirmed'],
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
    <div class="mb-6">
        <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">Registrations</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">National Research Innovation Summit 2026 — Participant Registration Database</p>
    </div>

    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <form action="" method="GET" class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-1 flex-col gap-3 sm:flex-row sm:flex-wrap">
                <div class="flex min-w-0 flex-1 items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-3 transition focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 sm:max-w-sm">
                    <i data-lucide="search" class="h-4 w-4 shrink-0 text-slate-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search participant name or email..." class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                </div>

                <div class="relative">
                    <select name="status" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-10 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:w-auto">
                        <option value="">Status: All</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 inset-e-3 flex items-center">
                        <i data-lucide="chevron-down" class="h-4 w-4 text-slate-400"></i>
                    </div>
                </div>

                <div class="relative">
                    <select name="organization" class="w-full truncate appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-10 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:w-64">
    <option value="">Organization: All BRIN Center</option>
    <option value="physics">Pusat data dan Informasi</option>
    <option value="informatics">Electronics and Informatics Institute</option>
    <option value="space">Space Engineering Lab</option>
    <option value="maritime">Maritime Technology Center</option>
</select>
                    <div class="pointer-events-none absolute inset-y-0 inset-e-3 flex items-center">
                        <i data-lucide="chevron-down" class="h-4 w-4 text-slate-400"></i>
                    </div>
                </div>
            </div>

            <a href="#" class="inline-flex items-center justify-center gap-2 rounded-lg border border-blue-500 py-2.5 ps-4 pe-4 text-sm font-semibold text-blue-600 transition hover:bg-blue-50 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/40">
                <i data-lucide="download" class="h-4 w-4"></i>
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

                <tbody>
                    @foreach($registrations as $registration)
                        @php $status=strtolower($registration['status']); @endphp
                        <tr class="group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="max-w-48 p-4">
                                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $registration['name'] }}</p>
                            </td>
                            <td class="max-w-56 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">{{ $registration['email'] }}</p>
                            </td>
                            <td class="max-w-64 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">{{ $registration['organization'] }}</p>
                            </td>
                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $registration['date'] }}</td>
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
                                <div class="flex justify-center">
                                    <button type="button" class="registration-detail flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/50" data-name="{{ $registration['name'] }}" data-email="{{ $registration['email'] }}" data-organization="{{ $registration['organization'] }}" data-date="{{ $registration['date'] }}" data-status="{{ $registration['status'] }}">
                                        <i data-lucide="eye" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @foreach($registrations as $registration)
                @php $status=strtolower($registration['status']); @endphp
                <article class="p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h2 class="truncate font-semibold text-slate-900 dark:text-white">{{ $registration['name'] }}</h2>
                            <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">{{ $registration['email'] }}</p>
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
                            <i data-lucide="building-2" class="mt-0.5 h-4 w-4 shrink-0"></i>
                            <span>{{ $registration['organization'] }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="calendar-days" class="h-4 w-4 shrink-0"></i>
                            <span>{{ $registration['date'] }}</span>
                        </div>
                    </div>

                    <button type="button" class="registration-detail mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950" data-name="{{ $registration['name'] }}" data-email="{{ $registration['email'] }}" data-organization="{{ $registration['organization'] }}" data-date="{{ $registration['date'] }}" data-status="{{ $registration['status'] }}">
                        <i data-lucide="eye" class="h-4 w-4"></i>
                        <span>View Detail</span>
                    </button>
                </article>
            @endforeach
        </div>
    </div>

    <div class="mt-4 flex flex-col gap-4 text-sm sm:flex-row sm:items-center sm:justify-between">
        <p class="text-slate-500 dark:text-slate-400">Showing 1-10 of 128 registered personnel.</p>
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

{{-- detail registered --}}
<div id="registrationModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-lg rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
        <div class="flex items-center justify-between border-b border-slate-100 p-5 dark:border-slate-800">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">Registration Detail</h2>
            <button id="closeRegistrationModal" type="button" class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="x" class="h-5 w-5"></i>
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
            <button id="cancelRegistrationBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-red-950/40 dark:hover:text-red-400">Cancel Registration</button>
            <button id="confirmTicketBtn" type="button" class="inline-flex items-center justify-center rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-lg active:scale-95">Confirm Registration</button>
        </div>
    </div>
</div>
@endsection
