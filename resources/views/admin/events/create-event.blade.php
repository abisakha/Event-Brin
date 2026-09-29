@extends('admin.layouts.main')

@section('title','Create Event - BRIN Event Management')

@section('content')
<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">Create New Event</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Set up registration details, schedules, and locations for your science forum.</p>
    </div>

   <form id="createEventForm" action="{{ isset($event) ? route('admin.events.update',$event->id) : route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif
    <div class="space-y-8 p-4 sm:p-6 lg:p-8">
        <section>
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">1</div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Event Information</h2>
                    <p class="text-xs text-slate-400">Basic information about your event.</p>
                </div>
            </div>

            <div class="space-y-5">
                <div>
                    <label for="event_name" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Event Title <span class="text-red-500">*</span>
                    </label>
                    <input id="event_name" type="text" name="event_name" value="{{ old('event_name',isset($event) ? $event->event_name : '') }}" placeholder="e.g. National Research Innovation Summit 2026" class="w-full rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:border-slate-600 dark:focus:border-blue-500 dark:focus:bg-slate-800">
                    @error('event_name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4" placeholder="Write a comprehensive overview of the event, keynote speakers, and objectives." class="w-full resize-none rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:border-slate-600 dark:focus:border-blue-500 dark:focus:bg-slate-800">{{ old('description',isset($event) ? $event->description : '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="satker_id" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Satker <span class="text-red-500">*</span>
                    </label>
                    <input type="hidden" name="satker_id" value="{{ auth()->user()->satker_id }}">
                    <input id="satker_id" type="text" value="{{ auth()->user()->satker->unit_name }}" readonly class="w-full rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm text-slate-900 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:border-slate-600 dark:focus:border-blue-500 dark:focus:bg-slate-800">
                    @error('satker_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <div class="border-t border-slate-200 dark:border-slate-800"></div>

        <section>
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">2</div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Event Image</h2>
                    <p class="text-xs text-slate-400">Upload an image or banner for your event.</p>
                </div>
            </div>

            <div id="eventImageUpload">
                <input id="event_image" type="file" name="event_image" accept="image/png,image/jpeg,image/webp" class="hidden">

                <div id="eventImageEmpty" class="{{ $event?->event_image ? 'hidden' : '' }}">
                    <label for="event_image" class="group flex min-h-48 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-6 text-center transition hover:border-blue-400 hover:bg-blue-50/50 dark:border-slate-700 dark:bg-slate-800/60 dark:hover:border-blue-600 dark:hover:bg-blue-950/20">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600 transition group-hover:scale-105 dark:bg-blue-950/60 dark:text-blue-400">
                            <i data-lucide="image-up" class="h-6 w-6"></i>
                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Upload Event Image
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Click to choose an image from your device
                        </p>

                        <div class="mt-4 inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white py-2 ps-4 pe-4 text-xs font-semibold text-slate-600 shadow-sm transition group-hover:border-blue-300 group-hover:text-blue-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                            <i data-lucide="upload" class="h-4 w-4"></i>
                            Choose Image
                        </div>

                        <p class="mt-3 text-xs text-slate-400">
                            JPG, PNG or WEBP • Maximum 5 MB
                        </p>
                    </label>
                </div>

                <div id="eventImagePreview" class="{{ $event?->event_image ? '' : 'hidden' }}">
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800">
                        <div class="relative">
                        <img id="eventImagePreviewImage" src="{{ $event?->image_url ?? '' }}" alt="{{ $event?->event_name ?? 'Event image preview' }}" class="h-64 w-full object-cover sm:h-72">                            <button id="removeEventImage" type="button" class="absolute right-3 top-3 flex h-9 w-9 items-center justify-center rounded-lg bg-white/90 text-slate-600 shadow-md backdrop-blur transition hover:bg-red-500 hover:text-white dark:bg-slate-900/90 dark:text-slate-300">
                                <i data-lucide="x" class="h-4 w-4"></i>
                            </button>
                        </div>

                        <div class="flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="min-w-0">
                                <p id="eventImageName" class="truncate text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $event?->event_name ?? '' }}</p>
                                <p id="eventImageSize" class="mt-1 text-xs text-slate-400">{{ $event?->event_image ? 'Current event image' : '' }}</p>
                            </div>

                            <label for="event_image" class="inline-flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2 ps-3 pe-3 text-xs font-semibold text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                                <i data-lucide="image-up" class="h-4 w-4"></i>
                                Change Image
                            </label>
                        </div>
                    </div>
                </div>

                <p id="eventImageError" class="mt-2 hidden text-xs font-medium text-red-500"></p>
                @error('event_image')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </section>

        <div class="border-t border-slate-200 dark:border-slate-800"></div>

        <section>
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">3</div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Schedule</h2>
                    <p class="text-xs text-slate-400">Set the start and end time of your event.</p>
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="start_date" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Start Date/Time <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-days" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="start_date" type="datetime-local" name="start_date" value="{{ old('start_date',isset($event) && $event->start_date ? $event->start_date->format('Y-m-d\TH:i') : '') }}" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                    </div>

                    @error('start_date')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="end_date" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        End Date/Time <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-days" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="end_date" type="datetime-local" name="end_date" value="{{ old('end_date',isset($event) && $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '') }}" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                    </div>

                    @error('end_date')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <div class="border-t border-slate-200 dark:border-slate-800"></div>

        <section>
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">4</div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Location Settings</h2>
                    <p class="text-xs text-slate-400">Choose where the event will take place.</p>
                </div>
            </div>

            <div class="space-y-5">
                <div>
                    <p class="mb-2 text-sm font-semibold text-slate-600 dark:text-slate-300">Format</p>

                    <div class="inline-flex rounded-lg bg-slate-100 p-1 dark:bg-slate-800">
                        <input id="in_person" type="radio" name="format" value="offline" class="peer/inperson hidden" @checked(old('format',isset($event) ? $event->format : 'offline') === 'offline')>

                        <label for="in_person" class="cursor-pointer rounded-md py-2 ps-4 pe-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900 peer-checked/inperson:bg-white peer-checked/inperson:text-slate-900 peer-checked/inperson:shadow-sm dark:text-slate-400 dark:hover:text-white dark:peer-checked/inperson:bg-slate-700 dark:peer-checked/inperson:text-white">
                            In-Person Venue
                        </label>

                        <input id="online" type="radio" name="format" value="online" class="peer/online hidden" @checked(old('format',isset($event) ? $event->format : '') === 'online')>

                        <label for="online" class="cursor-pointer rounded-md py-2 ps-4 pe-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900 peer-checked/online:bg-white peer-checked/online:text-slate-900 peer-checked/online:shadow-sm dark:text-slate-400 dark:hover:text-white dark:peer-checked/online:bg-slate-700 dark:peer-checked/online:text-white">
                            Online Webinar
                        </label>
                    </div>

                    @error('format')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location_area" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Location Area
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="map" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="location_area" type="text" name="location_area" value="{{ old('location_area',isset($event) ? $event->location_area : '') }}" placeholder="e.g. Jakarta" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>

                    @error('location_area')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Venue or Online Meeting Link <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="map-pin" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="location" type="text" name="location" value="{{ old('location',isset($event) ? $event->location : '') }}" placeholder="Gedung BJ Habibie Auditorium Utama or online meeting link" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>

                    @error('location')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <div class="border-t border-slate-200 dark:border-slate-800"></div>

        <section>
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">5</div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Registration Settings</h2>
                    <p class="text-xs text-slate-400">Configure participant capacity and registration schedule.</p>
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-3">
                <div>
                    <label for="quota" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Max Participants <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="users" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="quota" type="number" name="quota" value="{{ old('quota',isset($event) ? $event->quota : '') }}" min="1" placeholder="150" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none placeholder:text-slate-400 dark:text-white">
                    </div>

                    @error('quota')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="registration_start" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Registration Start <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-clock" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="registration_start" type="datetime-local" name="registration_start" value="{{ old('registration_start',isset($event) && $event->registration_start ? $event->registration_start->format('Y-m-d\TH:i') : '') }}" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                    </div>

                    @error('registration_start')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="registration_end" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Registration End <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-clock" class="h-4 w-4 shrink-0 text-slate-400"></i>
                        <input id="registration_end" type="datetime-local" name="registration_end" value="{{ old('registration_end',isset($event) && $event->registration_end ? $event->registration_end->format('Y-m-d\TH:i') : '') }}" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-900 outline-none dark:text-white">
                    </div>

                    @error('registration_end')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>
    </div>

    <div class="flex flex-col-reverse gap-3 border-t border-slate-200 p-4 sm:flex-row sm:justify-end sm:p-6 dark:border-slate-800">
        <button type="submit" name="status" value="draft" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
            <i data-lucide="save" class="h-4 w-4"></i>
            <span>Save as Draft</span>
        </button>

        <button type="submit" name="status" value="published" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-lg active:scale-95">
            <i data-lucide="send" class="h-4 w-4"></i>
            <span>Publish Event</span>
        </button>
    </div>
</form>
</section>
@endsection

