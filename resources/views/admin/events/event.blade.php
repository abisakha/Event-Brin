@extends('admin.layouts.main')

@section('content')
@php
    $events=[
        ['id'=>1,'name'=>'N National Research Innovation Summit 2026 National Research Innovation Summit 2026National Research Innovation Summit 2026National Research Innovation Summit 2026','date'=>'Oct 12, 2026','location'=>'Jakarta Office','registration'=>'128 / 150','status'=>'Published','description'=>'A national forum bringing together researchers, practitioners, and stakeholders to discuss research innovation and strategic collaboration.'],
        ['id'=>2,'name'=>'Artificial Intelligence in Public Policy','date'=>'Nov 05, 2026','location'=>'Online Zoom Meeting','registration'=>'92 / 100','status'=>'Published','description'=>'A focused discussion on the use of artificial intelligence in public policy, digital transformation, and government decision making.'],
        ['id'=>3,'name'=>'Maritime Tech Expo & Maritime Forum','date'=>'Dec 18, 2026','location'=>'Bali Office','registration'=>'0 / 200','status'=>'Draft','description'=>'An exhibition and discussion forum showcasing innovation, research, and technology development in the maritime sector.'],
        ['id'=>4,'name'=>'Nuclear Physics and Energy Colloquium','date'=>'Jan 14, 2027','location'=>'Yogyakarta Facility','registration'=>'45 / 80','status'=>'Published','description'=>'A scientific colloquium discussing current developments in nuclear physics, energy research, and related technologies.'],
        ['id'=>5,'name'=>'Agritech Symposium for Sustainable Crop','date'=>'Feb 20, 2027','location'=>'Online Zoom Meeting','registration'=>'15 / 150','status'=>'Draft','description'=>'A symposium focusing on agricultural technology and sustainable solutions for improving crop productivity.'],
        ['id'=>6,'name'=>'Clean Water Sanitation and Green Tech','date'=>'Mar 10, 2027','location'=>'Bandung Hub Office','registration'=>'148 / 150','status'=>'Completed','description'=>'A collaborative forum exploring clean water, sanitation, and environmentally sustainable technology solutions.'],
        ['id'=>7,'name'=>'Indonesian Space Research Group Meeting','date'=>'Apr 02, 2027','location'=>'Jakarta HQ Office','registration'=>'0 / 50','status'=>'Draft','description'=>'A research group meeting focused on Indonesian space science, engineering, collaboration, and future research programs.']
    ];
@endphp

<script id="eventData" type="application/json">
@json($events)
</script>

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
                <button type="button" data-event-filter="all" class="event-filter rounded-lg bg-blue-600 py-2 ps-4 pe-4 text-xs font-semibold text-white transition hover:bg-blue-700">
                    All
                </button>

                <button type="button" data-event-filter="draft" class="event-filter rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                    Draft
                </button>

                <button type="button" data-event-filter="published" class="event-filter rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                    Published
                </button>

                <button type="button" data-event-filter="completed" class="event-filter rounded-lg border border-slate-200 bg-slate-50 py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                    Completed
                </button>
            </div>

            <form id="eventSearchForm" class="group relative w-full lg:w-72">
                <div class="flex items-center gap-2 rounded-lg border border-transparent bg-slate-50 py-2.5 ps-3 pe-3 transition hover:bg-slate-100 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus-within:bg-slate-800">
                    <i data-lucide="search" class="h-4 w-4 shrink-0 text-slate-400"></i>

                    <input id="eventSearchInput" type="search" placeholder="Search my events..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                </div>

                <div class="absolute start-0 top-full z-50 mt-2 hidden w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl group-focus-within:block dark:border-slate-700 dark:bg-slate-900">
                    <div class="border-b border-slate-100 py-2 ps-3 pe-3 dark:border-slate-800">
                        <p class="text-xs font-semibold text-slate-400">Event Name</p>
                    </div>

                    <div class="max-h-80 overflow-y-auto p-1.5">
                        @foreach($events as $event)
                            <button type="button" data-event-suggestion data-event-id="{{ $event['id'] }}" data-event-name="{{ $event['name'] }}" class="group/item flex w-full items-center gap-3 rounded-lg p-3 text-left transition hover:bg-slate-50 dark:hover:bg-slate-800">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition group-hover/item:bg-blue-100 dark:bg-blue-950/50 dark:text-blue-400">
                                    <i data-lucide="calendar-days" class="h-4 w-4"></i>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-medium text-slate-700 transition group-hover/item:text-blue-600 dark:text-slate-200 dark:group-hover/item:text-blue-400">
                                        {{ $event['name'] }}
                                    </p>

                                    <p class="mt-0.5 truncate text-xs text-slate-400">
                                        {{ $event['date'] }} • {{ $event['location'] }}
                                    </p>
                                </div>

                                <i data-lucide="chevron-right" class="h-4 w-4 shrink-0 text-slate-300 transition group-hover/item:translate-x-0.5 group-hover/item:text-blue-500"></i>
                            </button>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>

        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-center align-middle dark:border-slate-800 dark:bg-slate-950/40">
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Event Name</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Date</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Location</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Registrations</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Status</th>
                        <th class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($events as $index=>$event)
                        @php $status=strtolower($event['status']); @endphp

                        <tr data-event-item data-event-id="{{ $event['id'] }}" data-event-status="{{ $status }}" data-event-name="{{ strtolower($event['name']) }}" class="group border-b border-slate-200 transition duration-200 last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="w-96 max-w-96 p-4 align-top">
                                <p class="break-words whitespace-normal text-sm! font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                    {{ $event['name'] }}
                                </p>
                            </td>

                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                                {{ $event['date'] }}
                            </td>

                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                                {{ $event['location'] }}
                            </td>

                            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                                {{ $event['registration'] }}
                            </td>

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
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ url('/admin/events/'.$event['id'].'/edit') }}" title="Edit Event" aria-label="Edit Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                                        <i data-lucide="square-pen" class="h-4 w-4"></i>
                                    </a>

                                    <button type="button" data-event-view="{{ $index }}" title="View Event" aria-label="View Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                                        <i data-lucide="eye" class="h-4 w-4"></i>
                                    </button>

                                    <button type="button" data-event-delete="{{ $index }}" title="Delete Event" aria-label="Delete Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:hover:bg-red-950/40">
                                        <i data-lucide="trash-2" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr id="desktopEventEmpty" class="hidden">
                        <td colspan="6" class="p-10 text-center">
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                <i data-lucide="calendar-x" class="size-5"></i>
                            </div>

                            <h3 class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">
                                No events found
                            </h3>

                            <p class="mt-1 text-xs text-slate-400">
                                Try another status or search keyword.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @foreach($events as $index=>$event)
                @php $status=strtolower($event['status']); @endphp

                <article data-event-item data-event-id="{{ $event['id'] }}" data-event-status="{{ $status }}" data-event-name="{{ strtolower($event['name']) }}" class="group p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h2 class="font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                {{ $event['name'] }}
                            </h2>

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

                    <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                        <a href="{{ url('/admin/events/'.$event['id'].'/edit') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                            <i data-lucide="square-pen" class="h-4 w-4"></i>
                            <span>Edit</span>
                        </a>

                        <button type="button" data-event-view="{{ $index }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-100 py-2 ps-3 pe-3 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 active:scale-95 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
                            <i data-lucide="eye" class="h-4 w-4"></i>
                            <span>View</span>
                        </button>

                        <button type="button" data-event-delete="{{ $index }}" class="inline-flex items-center gap-2 rounded-lg bg-red-50 py-2 ps-3 pe-3 text-xs font-semibold text-red-500 transition hover:bg-red-100 hover:text-red-600 active:scale-95 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">
                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </article>
            @endforeach

            <div id="mobileEventEmpty" class="hidden p-10 text-center">
                <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                    <i data-lucide="calendar-x" class="size-5"></i>
                </div>

                <h3 class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">
                    No events found
                </h3>

                <p class="mt-1 text-xs text-slate-400">
                    Try another status or search keyword.
                </p>
            </div>
        </div>
    </div>
</section>

<div id="eventDetailModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-screen w-full max-w-2xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="border-b border-slate-200 p-5 dark:border-slate-800">
            <div class="flex items-start justify-between gap-4">
                <div class="min-w-0">
                    <div class="mb-2 flex flex-wrap items-center gap-2">
                        <span id="detailStatus" class="rounded-full py-1 ps-3 pe-3 text-xs font-semibold"></span>
                    </div>

                    <h2 id="detailName" class="text-xl font-bold leading-7 text-slate-900 dark:text-white"></h2>

                    <p class="mt-1 text-sm text-slate-400">
                        Event information and registration overview
                    </p>
                </div>

                <button id="closeEventDetail" type="button" class="flex size-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white" aria-label="Close detail">
                    <i data-lucide="x" class="size-5"></i>
                </button>
            </div>
        </div>

        <div class="overflow-y-auto p-5">
            <div class="grid gap-3 sm:grid-cols-3">
                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800/60">
                    <div class="flex size-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                        <i data-lucide="calendar-days" class="size-4"></i>
                    </div>

                    <p class="mt-3 text-xs font-medium text-slate-400">Event Date</p>
                    <p id="detailDate" class="mt-1 text-sm font-semibold text-slate-800 dark:text-white"></p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800/60">
                    <div class="flex size-9 items-center justify-center rounded-lg bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400">
                        <i data-lucide="map-pin" class="size-4"></i>
                    </div>

                    <p class="mt-3 text-xs font-medium text-slate-400">Location</p>
                    <p id="detailLocation" class="mt-1 text-sm font-semibold text-slate-800 dark:text-white"></p>
                </div>

                <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-800/60">
                    <div class="flex size-9 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                        <i data-lucide="users" class="size-4"></i>
                    </div>

                    <p class="mt-3 text-xs font-medium text-slate-400">Registrations</p>
                    <p id="detailRegistration" class="mt-1 text-sm font-semibold text-slate-800 dark:text-white"></p>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="text-sm font-bold text-slate-800 dark:text-white">About This Event</h3>

                <p id="detailDescription" class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400"></p>
            </div>

            <div class="mt-5">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">Registration Capacity</p>
                    <span id="detailRegistrationPercent" class="text-xs font-semibold text-blue-600 dark:text-blue-400"></span>
                </div>

                <div class="h-2 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
                    <div id="detailRegistrationBar" class="h-full rounded-full bg-blue-600 transition-all duration-300"></div>
                </div>
            </div>
        </div>

        <div class="flex flex-col-reverse gap-2 border-t border-slate-200 p-4 sm:flex-row sm:justify-end dark:border-slate-800">
            <button id="closeEventDetailFooter" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                Close
            </button>

            <a id="detailEditLink" href="#" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700">
                <i data-lucide="square-pen" class="size-4"></i>
                <span>Edit Event</span>
            </a>
        </div>
    </div>
</div>

<div id="deleteEventModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="p-6 text-center">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-red-100 text-red-500 dark:bg-red-950/50 dark:text-red-400">
                <i data-lucide="trash-2" class="size-6"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">
                Delete Event?
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                Are you sure you want to delete
                <span id="deleteEventName" class="font-semibold text-slate-700 dark:text-slate-200"></span>?
                This action cannot be undone.
            </p>

            <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
                <button id="cancelDeleteEvent" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button id="confirmDeleteEvent" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-500 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete Event</span>
                </button>

                {{--
                BACKEND LATER:
                <form action="{{ url('/admin/events/'.$event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                --}}
            </div>
        </div>
    </div>
</div>
@endsection
