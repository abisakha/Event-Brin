@extends('admin.layouts.main')

@section('content')
@php
    // data dummy
    $events=[
        ['id'=>1,'name'=>'N National Research Innovation Summit 2026 National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026','date'=>'Oct 12, 2026','location'=>'Jakarta Office','registration'=>'128 / 150','status'=>'Published'],
        ['id'=>2,'name'=>'Artificial Intelligence in Public Policy','date'=>'Nov 05, 2026','location'=>'Online Zoom Meeting','registration'=>'92 / 100','status'=>'Published'],
        ['id'=>3,'name'=>'Maritime Tech Expo & Maritime Forum','date'=>'Dec 18, 2026','location'=>'Bali Office','registration'=>'0 / 200','status'=>'Draft'],
        ['id'=>4,'name'=>'Nuclear Physics and Energy Colloquium','date'=>'Jan 14, 2027','location'=>'Yogyakarta Facility','registration'=>'45 / 80','status'=>'Published'],
        ['id'=>5,'name'=>'Agritech Symposium for Sustainable Crop','date'=>'Feb 20, 2027','location'=>'Online Zoom Meeting','registration'=>'15 / 150','status'=>'Draft'],
        ['id'=>6,'name'=>'Clean Water Sanitation and Green Tech','date'=>'Mar 10, 2027','location'=>'Bandung Hub Office','registration'=>'148 / 150','status'=>'Completed'],
        ['id'=>7,'name'=>'Indonesian Space Research Group Meeting','date'=>'Apr 02, 2027','location'=>'Jakarta HQ Office','registration'=>'0 / 50','status'=>'Draft']
    ];
@endphp
<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">My Events</h1>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">List of science and technology seminars in your coordination pipeline.</p>
        </div>
        <a href="{{ url('/admin/events/create-event') }}" class="inline-flex w-fit items-center gap-2 rounded-3xl! bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-slate-950">
            <i data-lucide="plus" class="h-4 w-4"></i>
            <span>Create Event</span>
        </a>
    </div>
    <div class="overflow-visible rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="relative z-20 flex flex-col gap-4 border-b border-slate-200 p-4 dark:border-slate-800 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-wrap gap-2">
                <a href="{{ url('/admin/events') }}" class="rounded-lg bg-blue-600 py-2 ps-4 pe-4 text-xs font-semibold text-white transition hover:bg-blue-700">All</a>
                <a href="{{ url('/admin/events?status=draft') }}" class="rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">Draft</a>
                <a href="{{ url('/admin/events?status=published') }}" class="rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">Published</a>
                <a href="{{ url('/admin/events?status=completed') }}" class="rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">Completed</a>
            </div>

            {{-- search --}}
            <form action="{{ url('/admin/events') }}" method="GET" class="group relative w-full lg:w-72">
                <div class="flex items-center gap-2 rounded-lg border border-transparent bg-slate-50 py-2.5 ps-3 pe-3 transition hover:bg-slate-100 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus-within:bg-slate-800">
                    <i data-lucide="search" class="h-4 w-4 shrink-0 text-slate-400"></i>
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search my events..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                </div>
                <div class="absolute start-0 top-full z-50 mt-2 hidden w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl group-focus-within:block dark:border-slate-700 dark:bg-slate-900">
                    <div class="border-b border-slate-100 py-2 ps-3 pe-3 dark:border-slate-800">
                        <p class="text-xs font-semibold text-slate-400">Event Name</p>
                    </div>
                    <div class="max-h-80 overflow-y-auto p-1.5">
                        @foreach($events as $event)
                            <a href="{{ url('/admin/events?search='.urlencode($event['name'])) }}" class="group/item flex items-center gap-3 rounded-lg p-3 transition hover:bg-slate-50 dark:hover:bg-slate-800">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition group-hover/item:bg-blue-100 dark:bg-blue-950/50 dark:text-blue-400">
                                    <i data-lucide="calendar-days" class="h-4 w-4"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-medium text-slate-700 transition group-hover/item:text-blue-600 dark:text-slate-200 dark:group-hover/item:text-blue-400">{{ $event['name'] }}</p>
                                    <p class="mt-0.5 truncate text-xs text-slate-400">{{ $event['date'] }} • {{ $event['location'] }}</p>
                                </div>
                                <i data-lucide="chevron-right" class="h-4 w-4 shrink-0 text-slate-300 transition group-hover/item:translate-x-0.5 group-hover/item:text-blue-500"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50  text-center align-middle dark:border-slate-800 dark:bg-slate-950/40">
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Event Name</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Date</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Location</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Registrations</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Status</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- table events --}}
                    @foreach($events as $event)
                        @php $status=strtolower($event['status']); @endphp
                        <tr class="group border-b border-slate-200 transition duration-200 last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="w-96 max-w-96 p-4 align-top">
                                    <p class="whitespace-normal wrap-break-words text-sm! font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $event['name'] }}</p>
                            </td>
                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $event['date'] }}</td>
                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $event['location'] }}</td>
                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $event['registration'] }}</td>
                            <td class="p-4">
                                @if($status==='published')
                                    <span class="inline-flex rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs font-medium text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">Published</span>
                                @elseif($status==='completed')
                                    <span class="inline-flex rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">Completed</span>
                                @else
                                    <span class="inline-flex rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-slate-500 dark:bg-slate-800 dark:text-slate-400">Draft</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-1">
                                    <a href="{{ url('/admin/events/'.$event['id'].'/edit') }}" title="Edit Event" aria-label="Edit Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                                        <i data-lucide="square-pen" class="h-4 w-4"></i>
                                    </a>
                                    <a href="{{ url('/admin/events/'.$event['id']) }}" title="View Event" aria-label="View Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                                        <i data-lucide="eye" class="h-4 w-4"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @foreach($events as $event)
                @php $status=strtolower($event['status']); @endphp
                <article class="group p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <h2 class="font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $event['name'] }}</h2>
                            <div class="mt-3 space-y-2 text-sm text-slate-500 dark:text-slate-400">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar-days" class="h-4 w-4 shrink-0"></i>
                                    <span>{{ $event['date'] }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="map-pin" class="h-4 w-4 shrink-0"></i>
                                    <span>{{ $event['location'] }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="users" class="h-4 w-4 shrink-0"></i>
                                    <span>{{ $event['registration'] }} Registrations</span>
                                </div>
                            </div>
                        </div>
                        @if($status==='published')
                            <span class="shrink-0 rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs font-medium text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">Published</span>
                        @elseif($status==='completed')
                            <span class="shrink-0 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">Completed</span>
                        @else
                            <span class="shrink-0 rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-slate-500 dark:bg-slate-800 dark:text-slate-400">Draft</span>
                        @endif
                    </div>
                    <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                        <a href="{{ url('/admin/events/'.$event['id'].'/edit') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                            <i data-lucide="square-pen" class="h-4 w-4"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ url('/admin/events/'.$event['id']) }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-100 py-2 ps-3 pe-3 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 active:scale-95 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
                            <i data-lucide="eye" class="h-4 w-4"></i>
                            <span>View</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
