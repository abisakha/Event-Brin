@extends('user.layouts.main')
@section('content')
    <div class="brin-home">
        @include('user.partials.hero')

       <!-- ================= EVENT ================= -->
        <section class="py-20 md:py-12">
            <div class="container mx-auto px-6 lg:px-0">
                <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-shadow text-2xl font-extrabold text-slate-900 md:text-3xl">Upcoming Research Events</h2>
                        <p class="mt-2 text-sm text-slate-500">Actively enrolling sessions for researchers, academics, and partners</p>
                    </div>
                    <button class="h-8.5 px-5 rounded-full! border border-blue-600 bg-white text-sm font-medium text-blue-600 transition duration-300 hover:bg-blue-600! hover:text-white! hover:-translate-y-1 hover:shadow-lg active:scale-95">
                        See All Events
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    @for($i = 0; $i < 8; $i++)
                    <div class="group">
                        <div class="min-h-89 cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-white shadow-[0_0.25rem_0.75rem_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-[0_0.75rem_1.5625rem_rgba(37,99,235,0.15)]">
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('assets/images/card-image.png') }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            </div>

                            <div class="flex flex-col gap-4 p-4">
                                <div class="flex items-center justify-between">
                                    <span class="rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">ONLINE</span>
                                    <span class="text-xs font-semibold text-blue-600">20 May 2025</span>
                                </div>

                                <h5 class="line-clamp-2 text-lg! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600">BRIN Environment Policy Analysis Talk</h5>
                                <p class="m-0 flex items-center gap-2 text-sm text-slate-600">
                                    <img src="{{ asset('assets/images/location.png') }}" class="size-4 object-contain" alt="Location">
                                    Jakarta, Indonesia
                                </p>

                                <button class="mt-auto h-9.5 w-full rounded-full! border border-slate-300 bg-white text-sm font-semibold text-blue-600 transition duration-300 hover:border-blue-600! hover:bg-blue-600! hover:text-white!">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>

<!-- ================= CALENDAR ================= -->
<section class="py-10 md:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col items-start gap-8 lg:flex-row lg:gap-10">

            <!-- CALENDAR BOX -->
            <div class="mx-auto w-full rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:shadow-md sm:max-w-xl lg:mx-0 lg:w-5/12 lg:max-w-none lg:shrink-0">

                <div class="flex items-center justify-between">
                    <div>
                        <span class="mb-1 block text-xs font-semibold uppercase tracking-wide text-blue-600">Event Calendar</span>
                        <h4 id="monthYear" class="m-0 text-xl font-bold text-slate-900">May 2025</h4>
                    </div>

                    <div class="flex gap-2">
                        <button onclick="prevMonth()" class="flex size-8 items-center justify-center rounded-full! border border-slate-200 bg-white! text-sm text-slate-600 shadow-sm transition duration-300 hover:border-blue-600! hover:bg-blue-600! hover:text-white! hover:shadow-md">‹</button>
                        <button onclick="nextMonth()" class="flex size-8 items-center justify-center rounded-full! border border-slate-200 bg-white! text-sm text-slate-600 shadow-sm transition duration-300 hover:border-blue-600! hover:bg-blue-600! hover:text-white! hover:shadow-md">›</button>
                    </div>
                </div>

                <div class="my-3 h-px bg-slate-100"></div>

                <div class="grid grid-cols-7 gap-1 text-center sm:gap-2">
                    <span class="text-xs font-semibold text-slate-400">S</span>
                    <span class="text-xs font-semibold text-slate-400">M</span>
                    <span class="text-xs font-semibold text-slate-400">T</span>
                    <span class="text-xs font-semibold text-slate-400">W</span>
                    <span class="text-xs font-semibold text-slate-400">T</span>
                    <span class="text-xs font-semibold text-slate-400">F</span>
                    <span class="text-xs font-semibold text-slate-400">S</span>
                </div>

                <div id="calendarDays" class="mt-3 grid grid-cols-7 gap-1 sm:gap-2"></div>

                <div class="mt-3 flex items-center gap-2 border-t border-slate-100 pt-3">
                    <span class="size-2.5 rounded-full bg-blue-600"></span>
                    <span class="text-xs text-slate-500">Date with scheduled event</span>
                </div>

            </div>

            <!-- DESIGNED SECTION -->
            <div class="w-full flex-1">
                <h2 class="text-shadow mb-8 text-2xl font-extrabold leading-9 text-slate-900 md:text-3xl">Designed for Researchers & Innovators</h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3 lg:grid-cols-1">

                    <div class="group flex gap-3 rounded-xl p-2 transition hover:bg-slate-50">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-600 transition group-hover:rounded-full group-hover:bg-blue-600 group-hover:text-white">✓</div>
                        <div>
                            <h5 class="mb-1 text-lg font-bold">Easy Registration</h5>
                            <p class="m-0 text-sm leading-5 text-slate-500">Register securely in seconds with your institutional credential or email.</p>
                        </div>
                    </div>

                    <div class="group flex gap-3 rounded-xl p-2 transition hover:bg-slate-50">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-600 transition group-hover:rounded-full group-hover:bg-blue-600 group-hover:text-white">≡</div>
                        <div>
                            <h5 class="mb-1 text-lg font-bold">Real-time Updates</h5>
                            <p class="m-0 text-sm leading-5 text-slate-500">Get immediate system and schedule updates directly through our secure platform.</p>
                        </div>
                    </div>

                    <div class="group flex gap-3 rounded-xl p-2 transition hover:bg-slate-50">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-600 transition group-hover:rounded-full group-hover:bg-blue-600 group-hover:text-white">♟</div>
                        <div>
                            <h5 class="mb-1 text-lg font-bold">Digital Certificates</h5>
                            <p class="m-0 text-sm leading-5 text-slate-500">Claim verified digital certificates of attendance issued by BRIN.</p>
                        </div>
                    </div>

                </div>

                <!-- EVENT INFO -->
                <div id="eventInfo" class="mt-5 rounded-xl bg-slate-50 p-3">
                    <h5 class="mb-1 text-sm font-semibold">Select a date</h5>
                    <p class="m-0 text-xs">Click a date to view event information.</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
