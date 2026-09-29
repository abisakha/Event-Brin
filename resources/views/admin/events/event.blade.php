@extends('admin.layouts.main')

@section('content')
    <section class="p-4 sm:p-6 lg:p-8">
        {{-- HEADER HALAMAN MY EVENTS --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">My Events</h1>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">List of science and technology seminars in your coordination pipeline.</p>
            </div>

            {{-- CREATE EVENT --}}
            @can('create',\App\Models\Event::class)
                <a href="{{ url('/admin/events/create-event') }}" class="inline-flex w-fit items-center gap-2 rounded-3xl! bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-slate-950">
                    <i data-lucide="plus" class="h-4 w-4"></i>
                    <span>Create Event</span>
                </a>
            @endcan
        </div>

        <div class="overflow-visible rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
            {{-- FILTER STATUS DAN SEARCH EVENT --}}
            <div class="relative z-20 flex flex-col gap-4 border-b border-slate-200 p-4 dark:border-slate-800 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex flex-wrap gap-2">
                    <form action="" method="GET" class="flex flex-wrap gap-2">
                        <button type="submit" class="event-filter rounded-lg py-2 ps-4 pe-4 text-xs font-semibold transition {{ !request('status') ? 'bg-blue-600 text-white hover:bg-blue-700' : 'border border-slate-200 bg-slate-50 text-slate-600 hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300' }}">All</button>
                        <button type="submit" name="status" value="draft" class="event-filter rounded-lg py-2 ps-4 pe-4 text-xs font-semibold transition {{ request('status')==='draft' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'border border-slate-200 bg-slate-50 text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300' }}">Draft</button>
                        <button type="submit" name="status" value="published" class="event-filter rounded-lg py-2 ps-4 pe-4 text-xs font-semibold transition {{ request('status')==='published' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'border border-slate-200 bg-slate-50 text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300' }}">Published</button>
                        <button type="submit" name="status" value="completed" class="event-filter rounded-lg py-2 ps-4 pe-4 text-xs font-semibold transition {{ request('status')==='completed' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'border border-slate-200 bg-slate-50 text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300' }}">Completed</button>
                    </form>
                </div>
                {{-- SEARCH EVENT --}}
                <form id="eventSearchForm" class="relative w-full lg:w-72" action="" method="GET">
                    <div class="flex items-center gap-2 rounded-lg border border-transparent bg-slate-50 py-2.5 ps-3 pe-3 transition hover:bg-slate-100 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:bg-slate-800 dark:hover:bg-slate-700 dark:focus-within:bg-slate-800">
                        <i data-lucide="search" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="eventSearchInput" name="search" value="{{ request('search') }}" type="search" placeholder="Search my events..." autocomplete="off" class="min-w-0 flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>
                </form>
            </div>
            {{-- TABLE EVENT --}}
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
                        @forelse($events as $event)
                            <tr data-event-item
                                data-event-name="{{ strtolower($event->event_name) }}"
                                data-event-location="{{ strtolower($event->location) }}"
                                data-event-status="{{ strtolower($event->status->value) }}"
                                class="group border-b border-slate-200 transition duration-200 last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">

                                {{-- EVENT NAME --}}
                                <td class="w-96 max-w-96 p-4 align-top">
                                    <p class="break-words whitespace-normal text-sm! font-semibold text-slate-900 dark:text-white">{{ $event->event_name }}</p>
                                </td>

                                {{-- DATE --}}
                                <td class="p-4 text-sm text-slate-500 dark:text-slate-400">{{ $event->start_date }}</td>

                                {{-- LOCATION --}}
                                <td class="p-4 text-sm text-center text-slate-500 dark:text-slate-400">{{ $event->location }}</td>

                                {{-- REGISTRATION --}}
                                <td class="p-4 text-sm text-center text-slate-500 dark:text-slate-400">{{ $event->registrations_count }} / {{ $event->quota }}</td>

                                {{-- STATUS --}}
                                <td class="p-4">
                                    @if($event->status->value==='published')
                                        <span class="inline-flex rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs font-medium text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">Published</span>
                                    @elseif($event->status->value==='completed')
                                        <span class="inline-flex rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">Completed</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-slate-500 dark:bg-slate-800 dark:text-slate-400">Draft</span>
                                    @endif
                                </td>

                                {{-- ACTION --}}
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-1">

                                        {{-- EDIT EVENT --}}
                                        @can('update',$event)
                                            <a href="{{ route('admin.events.edit',$event->id) }}" title="Edit Event" aria-label="Edit Event" class="flex h-9 w-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                                                <i data-lucide="square-pen" class="h-4 w-4"></i>
                                            </a>
                                        @endcan

                                        {{-- VIEW EVENT MODAL --}}
                                        @can('view',$event)
                                            <button type="button"
                                                data-event-view
                                                data-event-name="{{ $event->event_name }}"
                                                data-event-date="{{ $event->start_date }}"
                                                data-event-location="{{ $event->location }}"
                                                data-event-description="{{ $event->description }}"
                                                data-event-status="{{ $event->status->value }}"
                                                data-event-registration="{{ $event->registrations_count ?? 0 }}"
                                                data-event-quota="{{ $event->quota }}"
                                                data-event-edit-url="{{ route('admin.events.edit',$event->id) }}"
                                                data-event-image="{{ $event->event_image ? (str_starts_with($event->event_image,'events/') ? \Illuminate\Support\Facades\Storage::disk('s3')->url($event->event_image) : asset(ltrim($event->event_image,'/'))) : asset('assets/image/card-image.png') }}"
                                                title="View Event"
                                                aria-label="View Event"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                                                <i data-lucide="eye" class="h-4 w-4"></i>
                                            </button>
                                        @endcan

                                        {{-- DELETE EVENT --}}
                                        @can('delete',$event)
                                            <button type="button"
                                                data-event-delete
                                                data-event-name="{{ $event->event_name }}"
                                                data-event-delete-url="{{ route('admin.events.destroy',$event->id) }}"
                                                title="Delete Event"
                                                aria-label="Delete Event"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:hover:bg-red-950/40">
                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                            </button>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-10 text-center">
                                    <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                        <i data-lucide="calendar-x" class="size-5"></i>
                                    </div>
                                    <h3 class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">No events found</h3>
                                    <p class="mt-1 text-xs text-slate-400">Try another status or search keyword.</p>
                                </td>
                            </tr>
                        @endforelse

                        {{-- EMPTY STATE LIVE SEARCH --}}
                        <tr id="desktopEventSearchEmpty" class="hidden">
                            <td colspan="6" class="p-10 text-center">
                                <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                                    <i data-lucide="search-x" class="size-5"></i>
                                </div>
                                <h3 class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">No events found</h3>
                                <p class="mt-1 text-xs text-slate-400">Try another search keyword.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if($events->hasPages())
                <div class="border-t border-slate-200 p-4 dark:border-slate-800">{{ $events->links() }}</div>
            @endif
        </div>
    </section>

        {{-- MODAL DETAIL EVENT --}}
        <div id="eventDetailModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
            <div class="flex max-h-screen w-full max-w-2xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
                <div class="border-b border-slate-200 p-5 dark:border-slate-800">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <div class="mb-2 flex flex-wrap items-center gap-2">
                                <span id="detailStatus" class="rounded-full py-1 ps-3 pe-3 text-xs font-semibold"></span>
                            </div>
                            <h2 id="detailName" class="text-xl font-bold leading-7 text-slate-900 dark:text-white"></h2>
                            <p class="mt-1 text-sm text-slate-400">Event information and registration overview</p>
                        </div>
                        <button id="closeEventDetail" type="button" class="flex size-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                            <i data-lucide="x" class="size-5"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-y-auto p-5">
                    <div class="mb-5 overflow-hidden rounded-xl border border-slate-200 bg-slate-100 dark:border-slate-800 dark:bg-slate-800">
                        <img id="detailImage" src="{{ asset('assets/image/card-image.png') }}" alt="Event Image" class="h-64 w-full object-cover">
                    </div>

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
                    <button id="closeEventDetailFooter" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">Close</button>
                    <a id="detailEditLink" href="#" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700">
                        <i data-lucide="square-pen" class="size-4"></i>
                        <span>Edit Event</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- MODAL DELETE EVENT --}}
        <div id="deleteEventModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
            <div class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
                <div class="p-6 text-center">
                    <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-red-100 text-red-500 dark:bg-red-950/50 dark:text-red-400">
                        <i data-lucide="trash-2" class="size-6"></i>
                    </div>
                    <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">Delete Event?</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">Are you sure you want to delete <span id="deleteEventName" class="font-semibold text-slate-700 dark:text-slate-200"></span>? This action cannot be undone.</p>
                    <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
                        <button id="cancelDeleteEvent" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">Cancel</button>
                        <form id="deleteEventForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-500 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                                <i data-lucide="trash-2" class="size-4"></i>
                                <span>Delete Event</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session('error'))
            <div id="errorToast" class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/40 p-4 backdrop-blur-sm">
                <div class="w-full max-w-xl rounded-2xl border border-red-200 bg-white p-6 shadow-2xl dark:border-red-900 dark:bg-slate-900">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-950/60 dark:text-red-400">
                            <i data-lucide="circle-alert" class="h-6 w-6"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Akses Ditolak</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">
                                {{ session('error') }}
                            </p>
                        </div>

                        <button id="closeErrorToast" type="button" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                            <i data-lucide="x" class="h-5 w-5"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endif
@endsection
