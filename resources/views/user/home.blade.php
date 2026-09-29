@extends('user.layouts.main')
@section('content')
    <div class="brin-home">
        @include('user.partials.hero')
        {{-- EVENT Card--}}
        <section class="py-20 md:py-12">
            <div class="container mx-auto px-6 lg:px-0">
                <div class="mb-8">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="text-shadow min-w-0 text-lg font-extrabold text-slate-900 sm:text-2xl md:text-3xl">
                            Upcoming Research Events
                        </h2>

                        <button class="h-8.5 shrink-0 rounded-full! border border-blue-600 bg-white px-3 text-[10px] font-medium text-blue-600 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:text-white! hover:shadow-lg active:scale-95 sm:px-5 sm:text-sm">
                            See All Events
                        </button>
                    </div>

                    <p class="mt-2 text-xs text-slate-500 sm:text-sm">
                        Actively enrolling sessions for researchers, academics, and partners
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-6 xl:grid-cols-4">
                    @foreach($events as $event)
                        <div class="group min-w-0">
                            <div class="min-h-89 cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-white shadow-[0_0.25rem_0.75rem_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-[0_0.75rem_1.5625rem_rgba(37,99,235,0.15)]">

                                <div class="h-28 overflow-hidden sm:h-40">
                                    <img src="{{ $event->event_image ? (str_starts_with($event->event_image,'events/') ? \Illuminate\Support\Facades\Storage::disk('s3')->url($event->event_image) : asset(ltrim($event->event_image,'/'))) : asset('assets/image/card-image.png') }}" alt="{{ $event->event_name }}">
                                </div>
                                <div class="flex flex-col gap-3 p-3 sm:gap-4 sm:p-4">
                                    <div class="flex items-center justify-between gap-2">
                                        <span class="shrink-0 rounded-md bg-blue-50 px-1.5 py-1 text-[9px] font-semibold text-blue-600 sm:px-2 sm:text-xs">
                                            {{ strtoupper($event->format) }}
                                        </span>

                                        <span class="truncate text-[9px] font-semibold text-blue-600 sm:text-xs">
                                            {{ $event->start_date->format('d M Y') }}
                                        </span>
                                    </div>

                                    <h5
                                        title="{{ $event->event_name }}"
                                        class="w-full truncate text-sm! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-lg!"
                                    >
                                        {{ $event->event_name }}
                                    </h5>

                                    <p class="m-0 flex min-w-0 items-center gap-1.5 text-[10px] text-slate-600 sm:gap-2 sm:text-sm">
                                        <img src="{{ asset('assets/images/location.png') }}" class="size-3 shrink-0 object-contain sm:size-4" alt="Location">

                                        <span class="truncate">
                                            {{ $event->format === 'online' ? 'Online Webinar' : $event->location }}
                                        </span>
                                    </p>

                                    <button class="mt-auto h-9.5 w-full rounded-full! border border-slate-300 bg-white text-[10px] font-semibold text-blue-600 transition duration-300 hover:border-blue-600! hover:bg-blue-600! hover:text-white! sm:text-sm">
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{--  EXPLORE BY REGION--}}
        <section class="pt-2 pb-15 sm:pt-3 sm:pb-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-0">

                <div class="mb-3 sm:mb-6">
                    <h2 class="text-shadow text-lg font-extrabold text-slate-900 sm:text-2xl md:text-3xl">
                        Explore by Region
                    </h2>

                    <p class="mt-1 text-[10px] text-slate-500 sm:mt-2 sm:text-sm">
                        Discover research and innovation events across BRIN locations
                    </p>
                </div>

                <div class="flex flex-wrap gap-1.5 sm:gap-3">
                    @foreach($events as $event)
                        <a
                            href="#"
                            class="group inline-flex max-w-full items-center gap-1 rounded-full bg-slate-50 px-2.5 py-1.5 text-[10px] font-semibold text-slate-900! no-underline! transition duration-300 hover:-translate-y-0.5 hover:bg-blue-50 hover:text-blue-600! hover:shadow-sm sm:gap-2 sm:px-4 sm:py-2.5 sm:text-sm"
                        >
                            <span class="truncate">
                                {{ $event->location_area }}
                            </span>

                            <svg class="size-3 shrink-0 text-slate-900 transition duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:text-blue-600 sm:size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                        </a>
                    @endforeach
                </div>

            </div>
        </section>
@endsection
