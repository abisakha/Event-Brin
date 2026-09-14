@extends('admin.layouts.main')

@section('title','Create Event - BRIN Event Management')

@section('content')
<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Create New Event</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Set up registration details, schedules, and locations for your science forum.</p>
    </div>

    <form action="{{ url('/admin/events') }}" method="POST" class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        @csrf
        <div class="space-y-8 p-4 sm:p-6 lg:p-8">
            <section>
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">1</div>
                    <div>
                        <h2 class="font-bold text-slate-900 dark:text-white">Event Information</h2>
                        <p class="text-xs text-slate-400">Basic information about your event.</p>
                    </div>
                </div>
                <div class="space-y-5">
                    <div>
                        <label for="title" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Event Title <span class="text-red-500">*</span></label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="e.g. National Research Innovation Summit 2026" required class="w-full rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:border-slate-600 dark:focus:border-blue-500 dark:focus:bg-slate-800">
                        @error('title')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Description <span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="4" placeholder="Write a comprehensive overview of the event, keynote speakers, and objectives." required class="w-full resize-none rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:border-slate-600 dark:focus:border-blue-500 dark:focus:bg-slate-800">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <div class="border-t border-slate-200 dark:border-slate-800"></div>

            <section>
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">2</div>
                    <div>
                        <h2 class="font-bold text-slate-900 dark:text-white">Schedule</h2>
                        <p class="text-xs text-slate-400">Set the start and end time of your event.</p>
                    </div>
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="start_datetime" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Start Date/Time <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                            <i data-lucide="calendar-days" class="h-4 w-4 shrink-0 text-slate-400"></i>
                            <input id="start_datetime" type="datetime-local" name="start_datetime" value="{{ old('start_datetime') }}" required class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                        </div>
                        @error('start_datetime')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="end_datetime" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">End Date/Time <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                            <i data-lucide="calendar-days" class="h-4 w-4 shrink-0 text-slate-400"></i>
                            <input id="end_datetime" type="datetime-local" name="end_datetime" value="{{ old('end_datetime') }}" required class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                        </div>
                        @error('end_datetime')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <div class="border-t border-slate-200 dark:border-slate-800"></div>

            <section>
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">3</div>
                    <div>
                        <h2 class="font-bold text-slate-900 dark:text-white">Location Settings</h2>
                        <p class="text-xs text-slate-400">Choose where the event will take place.</p>
                    </div>
                </div>
                <div class="space-y-5">
                    <div>
                        <p class="mb-2 text-sm font-semibold text-slate-600 dark:text-slate-300">Format</p>
                        <div class="inline-flex rounded-lg bg-slate-100 p-1 dark:bg-slate-800">
                            <input id="in_person" type="radio" name="format" value="in_person" class="peer/inperson hidden" {{ old('format','in_person')==='in_person'?'checked':'' }}>
                            <label for="in_person" class="cursor-pointer rounded-md py-2 ps-4 pe-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900 peer-checked/inperson:bg-white peer-checked/inperson:text-slate-900 peer-checked/inperson:shadow-sm dark:text-slate-400 dark:hover:text-white dark:peer-checked/inperson:bg-slate-700 dark:peer-checked/inperson:text-white">In-Person Venue</label>
                            <input id="online" type="radio" name="format" value="online" class="peer/online hidden" {{ old('format')==='online'?'checked':'' }}>
                            <label for="online" class="cursor-pointer rounded-md py-2 ps-4 pe-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900 peer-checked/online:bg-white peer-checked/online:text-slate-900 peer-checked/online:shadow-sm dark:text-slate-400 dark:hover:text-white dark:peer-checked/online:bg-slate-700 dark:peer-checked/online:text-white">Online Webinar</label>
                        </div>
                        @error('format')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="venue" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Venue or Online Meeting Link</label>
                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                            <i data-lucide="map-pin" class="h-4 w-4 shrink-0 text-slate-400"></i>
                            <input id="venue" type="text" name="venue" value="{{ old('venue') }}" placeholder="Gedung BJ Habibie Auditorium Utama or online meeting link" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none placeholder:text-slate-400 dark:text-white">
                        </div>
                        @error('venue')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <div class="border-t border-slate-200 dark:border-slate-800"></div>

            <section>
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">4</div>
                    <div>
                        <h2 class="font-bold text-slate-900 dark:text-white">Registration Settings</h2>
                        <p class="text-xs text-slate-400">Configure participant capacity and registration deadline.</p>
                    </div>
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="max_participants" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Max Participants</label>
                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                            <i data-lucide="users" class="h-4 w-4 shrink-0 text-slate-400"></i>
                            <input id="max_participants" type="number" name="max_participants" value="{{ old('max_participants') }}" min="1" placeholder="150" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none placeholder:text-slate-400 dark:text-white">
                        </div>
                        @error('max_participants')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="registration_deadline" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">Registration Deadline</label>
                        <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                            <i data-lucide="calendar-clock" class="h-4 w-4 shrink-0 text-slate-400"></i>
                            <input id="registration_deadline" type="datetime-local" name="registration_deadline" value="{{ old('registration_deadline') }}" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                        </div>
                        @error('registration_deadline')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 p-4 sm:flex-row sm:justify-end sm:p-6 dark:border-slate-800">
            <button type="submit" name="action" value="draft" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="save" class="h-4 w-4"></i>
                <span>Save as Draft</span>
            </button>
            <button type="submit" name="action" value="publish" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-lg active:scale-95">
                <i data-lucide="send" class="h-4 w-4"></i>
                <span>Publish Event</span>
            </button>
        </div>
    </form>
</section>

@if(session('success'))
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
        <div class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
            <div class="p-6 text-center sm:p-8">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <i data-lucide="circle-check-big" class="h-8 w-8"></i>
                </div>
                <h2 class="mt-5 text-xl font-bold text-slate-900 dark:text-white">Event Created Successfully</h2>
                <p class="mt-2 text-sm leading-relaxed text-slate-500 dark:text-slate-400">{{ session('success') }}</p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-center">
                    <a href="{{ url('/admin/events') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-lg active:scale-95">
                        <i data-lucide="calendar-days" class="h-4 w-4"></i>
                        <span>View My Events</span>
                    </a>
                    <a href="{{ url('/admin/events/create') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">Create Another</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
