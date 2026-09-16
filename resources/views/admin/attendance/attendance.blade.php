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
        <a href="#" class="inline-flex w-fit items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
            <i data-lucide="download" class="h-4 w-4"></i>
            <span>Export Attendance</span>
        </a>
    </div>

    <div class="mb-6 grid gap-4 md:grid-cols-2">
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Present</p>
                    <div class="mt-4 flex items-end gap-2">
                        <h2 class="text-3xl font-bold text-emerald-600 dark:text-emerald-400">{{ $totalPresent }}</h2>
                        <p class="pb-1 text-xs text-slate-500 dark:text-slate-400">/ {{ count($attendances) }} registered</p>
                    </div>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 transition group-hover:scale-105 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <i data-lucide="user-check" class="h-5 w-5"></i>
                </div>
            </div>
        </div>

        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Absent</p>
                    <div class="mt-4 flex items-end gap-2">
                        <h2 class="text-3xl font-bold text-amber-600 dark:text-amber-400">{{ $totalAbsent }}</h2>
                        <p class="pb-1 text-xs text-slate-500 dark:text-slate-400">remaining</p>
                    </div>
                </div>
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 transition group-hover:scale-105 dark:bg-amber-950/60 dark:text-amber-400">
                    <i data-lucide="user-x" class="h-5 w-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-30 mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <form action="" method="GET" class="flex flex-col gap-3 md:flex-row md:items-center">
            <div class="group relative w-full md:max-w-sm">
                <div class="flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 py-2.5 ps-3 pe-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                    <i data-lucide="search" class="h-4 w-4 shrink-0 text-slate-400"></i>
                    <input type="search" name="search" value="{{ $search }}" placeholder="Search participant name..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    @if($search)
                        <a href="{{ request()->fullUrlWithQuery(['search'=>null]) }}" class="flex shrink-0 items-center justify-center text-slate-400 transition hover:text-slate-700 dark:hover:text-white">
                            <i data-lucide="x" class="h-4 w-4"></i>
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
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                                    <i data-lucide="user" class="h-4 w-4"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-slate-700 transition group-hover/item:text-blue-600 dark:text-slate-200 dark:group-hover/item:text-blue-400">{{ $suggestion['name'] }}</p>
                                    <p class="mt-0.5 truncate text-xs text-slate-400">{{ $suggestion['email'] }}</p>
                                </div>
                                <i data-lucide="chevron-right" class="h-4 w-4 shrink-0 text-slate-300 transition group-hover/item:translate-x-0.5 group-hover/item:text-blue-500"></i>
                            </a>
                        @empty
                            <div class="p-4 text-center">
                                <i data-lucide="search-x" class="mx-auto h-5 w-5 text-slate-400"></i>
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
                    <i data-lucide="chevron-down" class="h-4 w-4 text-slate-400"></i>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <i data-lucide="filter" class="h-4 w-4"></i>
                <span>Apply</span>
            </button>

            @if($search||$statusFilter!=='all')
                <a href="{{ url()->current() }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-500 transition hover:bg-slate-50 hover:text-slate-900 dark:border-slate-700 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                    <i data-lucide="rotate-ccw" class="h-4 w-4"></i>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse($filteredAttendances as $attendance)
                        @php $status=strtolower($attendance['status']); @endphp
                        <tr class="group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="max-w-56 p-4">
                                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $attendance['name'] }}</p>
                            </td>
                            <td class="max-w-64 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">{{ $attendance['email'] }}</p>
                            </td>
                            <td class="max-w-72 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">{{ $attendance['organization'] }}</p>
                            </td>
                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $attendance['time'] }}</td>
                            <td class="p-4">
                                @if($status==='present')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Present
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Absent
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center">
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                    <i data-lucide="user-x" class="h-5 w-5"></i>
                                </div>
                                <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No attendance found</h3>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant name or attendance status.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @forelse($filteredAttendances as $attendance)
                @php $status=strtolower($attendance['status']); @endphp
                <article class="group p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h2 class="truncate font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $attendance['name'] }}</h2>
                            <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">{{ $attendance['email'] }}</p>
                        </div>
                        @if($status==='present')
                            <span class="shrink-0 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">Present</span>
                        @else
                            <span class="shrink-0 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">Absent</span>
                        @endif
                    </div>
                    <div class="mt-4 grid gap-3 text-sm text-slate-500 dark:text-slate-400 sm:grid-cols-2">
                        <div class="flex items-start gap-2">
                            <i data-lucide="building-2" class="mt-0.5 h-4 w-4 shrink-0"></i>
                            <span>{{ $attendance['organization'] }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock-3" class="h-4 w-4 shrink-0"></i>
                            <span>{{ $attendance['time'] }}</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="p-10 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                        <i data-lucide="user-x" class="h-5 w-5"></i>
                    </div>
                    <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">No attendance found</h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Try another participant name or attendance status.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
