@extends('admin.layouts.main')

@section('title','Attendance - BRIN Event Management')

@section('content')
{{-- data dummy hanya sementara --}}
@php
    $attendances=[
        ['id'=>1,'name'=>'Prof. Dr. Ir. Probowo Subiyanto paing mbgeng','email'=>'bambang.subiyanto@brin.go.id','organization'=>'Research Center for Physics','time'=>'08:42 AM','status'=>'Present'],
        ['id'=>2,'name'=>'Dr. Sri Hartini, M.T.','email'=>'sri.hartini@brin.go.id','organization'=>'Electronics and Informatics Institute','time'=>'08:50 AM','status'=>'Present'],
        ['id'=>3,'name'=>'Yudi Suryadi, M.T.','email'=>'yudi.suryadi@brin.go.id','organization'=>'Space Engineering Lab','time'=>'09:12 AM','status'=>'Present'],
        ['id'=>4,'name'=>'Siti Rahma, Ph.D.','email'=>'siti.rahma@brin.go.id','organization'=>'Maritime Technology Center','time'=>'--:--','status'=>'Absent'],
        ['id'=>5,'name'=>'Dr. Ir. Agus Rahmat','email'=>'agus.rahmat@brin.go.id','organization'=>'Center for Limnology','time'=>'09:02 AM','status'=>'Present'],
        ['id'=>6,'name'=>'Prof. Megawati Wijaya','email'=>'megawati.wijaya@brin.go.id','organization'=>'Oceanography Department','time'=>'--:--','status'=>'Absent'],
        ['id'=>7,'name'=>'Ahmad Fauzi, M.Sc.','email'=>'ahmad.fauzi@brin.go.id','organization'=>'Biotechnology Research Center','time'=>'08:35 AM','status'=>'Present'],
        ['id'=>8,'name'=>'Dr. Dewi Lestari','email'=>'dewi.lestari@brin.go.id','organization'=>'Meteorology and Climatology Lab','time'=>'08:55 AM','status'=>'Present']
    ];

    $search=trim(request('search',''));
    $statusFilter=strtolower(request('status','all'));

    $filteredAttendances=collect($attendances)->filter(function($attendance)use($search,$statusFilter){
        $matchSearch=$search===''||str_contains(strtolower($attendance['name']),strtolower($search));
        $matchStatus=$statusFilter==='all'||strtolower($attendance['status'])===$statusFilter;
        return $matchSearch&&$matchStatus;
    });

    $suggestions=collect($attendances)->filter(function($attendance)use($search){
        return $search===''||str_contains(strtolower($attendance['name']),strtolower($search));
    })->take(6);

    $totalPresent=collect($attendances)->where('status','Present')->count();
    $totalAbsent=collect($attendances)->where('status','Absent')->count();
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Attendance</h1>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">National Research Innovation Summit 2026 — Keynote & Forum Check-In</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <button id="openAttendanceForm" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <i data-lucide="user-plus" class="size-4"></i>
                <span>Add Attendance</span>
            </button>

            <button id="openQrScanner" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 hover:shadow-md active:scale-95">
                <i data-lucide="scan-line" class="size-4"></i>
                <span>Scan QR</span>
            </button>

            <a href="#" class="inline-flex w-fit items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                <i data-lucide="download" class="size-4"></i>
                <span>Export Attendance</span>
            </a>
        </div>
    </div>

    <div class="mb-6 grid gap-4 md:grid-cols-2">
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Present</p>

                    <div class="mt-4 flex items-end gap-2">
                        <h2 id="totalPresentCount" class="text-3xl font-bold text-emerald-600 dark:text-emerald-400">
                            {{ $totalPresent }}
                        </h2>

                        <p class="pb-1 text-xs text-slate-500 dark:text-slate-400">
                            / <span id="totalRegisteredCount">{{ count($attendances) }}</span> registered
                        </p>
                    </div>
                </div>

                <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 transition group-hover:scale-105 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <i data-lucide="user-check" class="size-5"></i>
                </div>
            </div>
        </div>

        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Absent</p>

                    <div class="mt-4 flex items-end gap-2">
                        <h2 id="totalAbsentCount" class="text-3xl font-bold text-amber-600 dark:text-amber-400">
                            {{ $totalAbsent }}
                        </h2>

                        <p class="pb-1 text-xs text-slate-500 dark:text-slate-400">remaining</p>
                    </div>
                </div>

                <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 transition group-hover:scale-105 dark:bg-amber-950/60 dark:text-amber-400">
                    <i data-lucide="user-x" class="size-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-30 mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <form action="" method="GET" class="flex flex-col gap-3 md:flex-row md:items-center">
            <div class="group relative w-full md:max-w-sm">
                <div class="flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                    <i data-lucide="search" class="size-4 shrink-0 text-slate-400"></i>

                    <input type="search" name="search" value="{{ $search }}" placeholder="Search participant name..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">

                    @if($search)
                        <a href="{{ request()->fullUrlWithQuery(['search'=>null]) }}" class="flex shrink-0 items-center justify-center text-slate-400 transition hover:text-slate-700 dark:hover:text-white">
                            <i data-lucide="x" class="size-4"></i>
                        </a>
                    @endif
                </div>

                <div class="absolute start-0 top-full z-50 mt-2 hidden w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl group-focus-within:block dark:border-slate-700 dark:bg-slate-900">
                    <div class="border-b border-slate-100 py-2 ps-3 pe-3 dark:border-slate-800">
                        <p class="text-xs font-semibold text-slate-400">Participant Name</p>
                    </div>

                    <div class="max-h-72 overflow-y-auto p-1.5">
                        @forelse($suggestions as $suggestion)
                            <a href="{{ request()->fullUrlWithQuery(['search'=>$suggestion['name']]) }}" class="group/item flex items-center gap-3 rounded-lg p-3 transition hover:bg-slate-50 dark:hover:bg-slate-800">
                                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                                    <i data-lucide="user" class="size-4"></i>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-slate-700 transition group-hover/item:text-blue-600 dark:text-slate-200 dark:group-hover/item:text-blue-400">
                                        {{ $suggestion['name'] }}
                                    </p>

                                    <p class="mt-0.5 truncate text-xs text-slate-400">
                                        {{ $suggestion['email'] }}
                                    </p>
                                </div>

                                <i data-lucide="chevron-right" class="size-4 shrink-0 text-slate-300 transition group-hover/item:translate-x-0.5 group-hover/item:text-blue-500"></i>
                            </a>
                        @empty
                            <div class="p-4 text-center">
                                <i data-lucide="search-x" class="mx-auto size-5 text-slate-400"></i>
                                <p class="mt-2 text-sm text-slate-500">Participant not found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="relative w-full md:w-48">
                <select name="status" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-10 text-sm text-slate-600 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                    <option value="all" @selected($statusFilter==='all')>Attendance: All</option>
                    <option value="present" @selected($statusFilter==='present')>Present</option>
                    <option value="absent" @selected($statusFilter==='absent')>Absent</option>
                </select>

                <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                    <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <i data-lucide="filter" class="size-4"></i>
                <span>Apply</span>
            </button>

            @if($search||$statusFilter!=='all')
                <a href="{{ url()->current() }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-500 transition hover:bg-slate-50 hover:text-slate-900 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                    <i data-lucide="rotate-ccw" class="size-4"></i>
                    <span>Reset</span>
                </a>
            @endif
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
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Check-in Time</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Attendance Status</th>
                        <th class="p-4 text-center text-xs font-semibold text-slate-500 dark:text-slate-400">Actions</th>
                    </tr>
                </thead>

                <tbody id="attendanceTableBody">
                    @forelse($filteredAttendances as $attendance)
                        @php $status=strtolower($attendance['status']); @endphp

                        <tr
                            data-attendance-item
                            data-attendance-id="{{ $attendance['id'] }}"
                            data-attendance-name="{{ $attendance['name'] }}"
                            data-attendance-email="{{ $attendance['email'] }}"
                            data-attendance-organization="{{ $attendance['organization'] }}"
                            data-attendance-time="{{ $attendance['time'] }}"
                            data-attendance-status="{{ $status }}"
                            class="group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60"
                        >
                            <td class="max-w-56 p-4">
                                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                    {{ $attendance['name'] }}
                                </p>
                            </td>

                            <td class="max-w-64 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                                    {{ $attendance['email'] }}
                                </p>
                            </td>

                            <td class="max-w-72 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                                    {{ $attendance['organization'] }}
                                </p>
                            </td>

                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                                {{ $attendance['time'] }}
                            </td>

                            <td class="p-4">
                                @if($status==='present')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                        Present
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">
                                        <span class="size-1.5 rounded-full bg-amber-500"></span>
                                        Absent
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center gap-1">
                                    <button type="button" data-attendance-edit="{{ $attendance['id'] }}" title="Edit Attendance" aria-label="Edit Attendance" class="flex size-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                                        <i data-lucide="square-pen" class="size-4"></i>
                                    </button>

                                    <button type="button" data-attendance-delete="{{ $attendance['id'] }}" title="Delete Attendance" aria-label="Delete Attendance" class="flex size-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:text-red-400 dark:hover:bg-red-950/40">
                                        <i data-lucide="trash-2" class="size-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr id="attendanceEmptyDesktop">
                            <td colspan="6" class="p-10 text-center">
                                <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                    <i data-lucide="user-x" class="size-5"></i>
                                </div>

                                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No attendance found</h3>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant name or attendance status.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div id="attendanceMobileList" class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @forelse($filteredAttendances as $attendance)
                @php $status=strtolower($attendance['status']); @endphp

                <article
                    data-attendance-item
                    data-attendance-id="{{ $attendance['id'] }}"
                    data-attendance-name="{{ $attendance['name'] }}"
                    data-attendance-email="{{ $attendance['email'] }}"
                    data-attendance-organization="{{ $attendance['organization'] }}"
                    data-attendance-time="{{ $attendance['time'] }}"
                    data-attendance-status="{{ $status }}"
                    class="group p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60"
                >
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h2 class="truncate font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                {{ $attendance['name'] }}
                            </h2>

                            <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">
                                {{ $attendance['email'] }}
                            </p>
                        </div>

                        @if($status==='present')
                            <span class="shrink-0 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                                Present
                            </span>
                        @else
                            <span class="shrink-0 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">
                                Absent
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 grid gap-3 text-sm text-slate-500 dark:text-slate-400 sm:grid-cols-2">
                        <div class="flex items-start gap-2">
                            <i data-lucide="building-2" class="mt-0.5 size-4 shrink-0"></i>
                            <span>{{ $attendance['organization'] }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <i data-lucide="clock-3" class="size-4 shrink-0"></i>
                            <span>{{ $attendance['time'] }}</span>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                        <button type="button" data-attendance-edit="{{ $attendance['id'] }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                            <i data-lucide="square-pen" class="size-4"></i>
                            <span>Edit</span>
                        </button>

                        <button type="button" data-attendance-delete="{{ $attendance['id'] }}" class="inline-flex items-center gap-2 rounded-lg bg-red-50 py-2 ps-3 pe-3 text-xs font-semibold text-red-500 transition hover:bg-red-100 hover:text-red-600 active:scale-95 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">
                            <i data-lucide="trash-2" class="size-4"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </article>
            @empty
                <div id="attendanceEmptyMobile" class="p-10 text-center">
                    <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                        <i data-lucide="user-x" class="size-5"></i>
                    </div>

                    <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No attendance found</h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant name or attendance status.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ADD / UPDATE MODAL --}}
<div id="attendanceFormModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-screen w-full max-w-xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="flex items-start justify-between gap-4 border-b border-slate-200 p-5 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <div id="attendanceModalIcon" class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                    <i data-lucide="user-plus" class="size-5"></i>
                </div>

                <div>
                    <h2 id="attendanceModalTitle" class="text-lg font-bold text-slate-900 dark:text-white">
                        Add Attendance Manually
                    </h2>

                    <p id="attendanceModalDescription" class="mt-0.5 text-xs text-slate-400">
                        Add participant attendance without check-in scanning.
                    </p>
                </div>
            </div>

            <button id="closeAttendanceForm" type="button" class="flex size-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form id="attendanceForm" class="overflow-y-auto">
            <div class="space-y-5 p-5">
                <div>
                    <label for="attendanceName" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Full Name <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="user" class="size-4 shrink-0 text-slate-400"></i>

                        <input id="attendanceName" type="text" required placeholder="Participant full name" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div>
                    <label for="attendanceEmail" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Email Address <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="mail" class="size-4 shrink-0 text-slate-400"></i>

                        <input id="attendanceEmail" type="email" required placeholder="participant@brin.go.id" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div>
                    <label for="attendanceOrganization" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Organization / Institute <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="building-2" class="size-4 shrink-0 text-slate-400"></i>

                        <input id="attendanceOrganization" type="text" required placeholder="Organization or institute" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="attendanceStatus" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                            Attendance Status <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <select id="attendanceStatus" class="w-full appearance-none rounded-lg border border-slate-200 bg-slate-50 p-3 pe-10 text-sm text-slate-700 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                            </select>

                            <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                                <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="attendanceTime" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                            Check-in Time
                        </label>

                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800">
                            <i data-lucide="clock-3" class="size-4 shrink-0 text-slate-400"></i>

                            <input id="attendanceTime" type="time" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none disabled:cursor-not-allowed disabled:opacity-50 dark:text-slate-200">
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
                    <div class="flex items-start gap-3">
                        <i data-lucide="info" class="mt-0.5 size-4 shrink-0 text-blue-500"></i>

                        <p class="text-xs leading-5 text-slate-500 dark:text-slate-400">
                            Attendance changes currently apply to the interface only. Database integration will be connected later.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-2 border-t border-slate-200 p-4 sm:flex-row sm:justify-end dark:border-slate-800">
                <button id="cancelAttendanceForm" type="button" class="rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                    <i id="attendanceSubmitIcon" data-lucide="user-plus" class="size-4"></i>
                    <span id="attendanceSubmitText">Add Attendance</span>
                </button>

                {{--
                BACKEND LATER:

                CREATE:
                POST attendance ke controller.

                UPDATE:
                PUT/PATCH attendance ke controller.
                --}}
            </div>
        </form>
    </div>
</div>

{{-- DELETE MODAL --}}
<div id="deleteAttendanceModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="p-6 text-center">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-red-100 text-red-500 dark:bg-red-950/50 dark:text-red-400">
                <i data-lucide="trash-2" class="size-6"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">
                Delete Attendance?
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                Are you sure you want to delete attendance for
                <span id="deleteAttendanceName" class="font-semibold text-slate-700 dark:text-slate-200"></span>?
            </p>

            <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
                <button id="cancelDeleteAttendance" type="button" class="rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button id="confirmDeleteAttendance" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-500 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete</span>
                </button>

                {{--
                BACKEND LATER:
                DELETE attendance dari controller/database.
                --}}
            </div>
        </div>
    </div>
</div>

{{-- QR SCAN MODAL --}}
<div id="qrScannerModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-screen w-full max-w-lg flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="flex items-start justify-between gap-4 border-b border-slate-200 p-5 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <i data-lucide="scan-line" class="size-5"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">Participant Check-In</h2>
                    <p class="mt-0.5 text-xs text-slate-400">Scan participant QR code or enter the token manually.</p>
                </div>
            </div>

            <button id="closeQrScanner" type="button" class="flex size-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <div class="overflow-y-auto p-5">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/50">
                <div class="flex items-start gap-3">
                    <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                        <i data-lucide="camera" class="size-5"></i>
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Scan With Camera</h3>

                        <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">
                            Use your device camera to scan the QR code displayed on the participant ticket.
                        </p>

                        <button type="button" class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 active:scale-95">
                            <i data-lucide="camera" class="size-4"></i>
                            <span>Open Camera</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="my-5 flex items-center gap-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
                <span class="text-xs font-semibold text-slate-400">OR</span>
                <div class="h-px flex-1 bg-slate-200 dark:bg-slate-700"></div>
            </div>

            <div>
                <div class="mb-3 flex items-center gap-3">
                    <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400">
                        <i data-lucide="keyboard" class="size-5"></i>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Enter Token Manually</h3>
                        <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">Enter the participant registration token.</p>
                    </div>
                </div>

                <label for="qrTokenInput" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                    Participant Token
                </label>

                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:focus-within:bg-slate-800">
                    <i data-lucide="ticket-check" class="size-4 shrink-0 text-slate-400"></i>

                    <input id="qrTokenInput" type="text" placeholder="Example: REG-BRIN-0001" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                </div>

                <button type="button" class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-emerald-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-emerald-700 active:scale-95">
                    <i data-lucide="circle-check" class="size-4"></i>
                    <span>Check-In Participant</span>
                </button>
            </div>

            <div class="mt-5 rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
                <div class="flex items-start gap-3">
                    <i data-lucide="info" class="mt-0.5 size-4 shrink-0 text-blue-500"></i>

                    <p class="text-xs leading-5 text-slate-500 dark:text-slate-400">
                        QR scanning and participant validation will be connected to the backend later.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded',()=>{
    const openQrScanner=document.getElementById('openQrScanner');
    const closeQrScanner=document.getElementById('closeQrScanner');
    const qrScannerModal=document.getElementById('qrScannerModal');

    openQrScanner?.addEventListener('click',()=>{
        qrScannerModal.classList.remove('hidden');
        qrScannerModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        if(window.lucide)window.lucide.createIcons();
    });

    closeQrScanner?.addEventListener('click',()=>{
        qrScannerModal.classList.add('hidden');
        qrScannerModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    });

    qrScannerModal?.addEventListener('click',(event)=>{
        if(event.target===qrScannerModal){
            qrScannerModal.classList.add('hidden');
            qrScannerModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    });
});
</script>

@endsection
