@extends('user.layouts.main')

@section('title', 'Kalender Event')

@section('content')

<section class="min-h-screen bg-slate-50 pb-12 pt-24 sm:pb-16 sm:pt-28">
    <div class="mx-auto max-w-7xl px-3 sm:px-6">
        {{-- Header --}}
        <div class="mb-4 flex flex-col gap-3 sm:mb-6 sm:gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-shadow text-lg font-extrabold text-slate-900 sm:text-2xl md:text-3xl">
                    Kalender Event
                </h1>

                <p class="mt-1 text-[10px] text-slate-500 sm:text-sm">
                    Lihat seluruh jadwal event dan agenda yang telah Anda registrasi.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-2 sm:flex sm:items-center sm:gap-3">

                <!-- CATEGORY - UI DUMMY -->
                <select class="h-7 min-w-0 cursor-pointer rounded-lg border border-slate-200 bg-white px-2 text-[9px] text-slate-700 shadow-sm outline-none transition hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 sm:h-10 sm:rounded-xl sm:px-4 sm:text-sm">
                    <option>Semua Event</option>
                    <option>Sudah Diregistrasi</option>
                </select>

                <!-- MONTH NAVIGATION -->
                <div class="flex h-7 min-w-0 items-center overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm sm:h-10 sm:rounded-xl">
                    <button type="button" id="prevMonth" class="flex h-full w-7 shrink-0 items-center justify-center text-sm text-slate-600 transition hover:bg-blue-600 hover:text-white sm:w-10 sm:text-lg">
                        ‹
                    </button>

                    <div id="headerMonth" class="min-w-0 flex-1 truncate px-1 text-center text-[9px] font-bold text-slate-900 sm:min-w-36 sm:px-4 sm:text-sm">
                        Januari 2025
                    </div>

                    <button type="button" id="nextMonth" class="flex h-full w-7 shrink-0 items-center justify-center text-sm text-slate-600 transition hover:bg-blue-600 hover:text-white sm:w-10 sm:text-lg">
                        ›
                    </button>
                </div>

            </div>
        </div>

        {{-- content --}}
        <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-12">

            {{-- calnedar --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:rounded-3xl lg:col-span-8">

                <div class="flex items-center justify-center border-b border-slate-100 px-3 py-3 sm:px-5 sm:py-4">
                    <h2 id="calendarMonth" class="text-xs font-bold text-slate-900 sm:text-base">
                        Januari 2025
                    </h2>
                </div>

                <!-- DAY NAMES -->
                <div class="grid grid-cols-7 border-b border-slate-100 px-1.5 py-2 sm:px-5 sm:py-3">
                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Senin</span>
                        <span class="sm:hidden">Sen</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Selasa</span>
                        <span class="sm:hidden">Sel</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Rabu</span>
                        <span class="sm:hidden">Rab</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Kamis</span>
                        <span class="sm:hidden">Kam</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Jumat</span>
                        <span class="sm:hidden">Jum</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Sabtu</span>
                        <span class="sm:hidden">Sab</span>
                    </div>

                    <div class="text-center text-[9px] font-semibold text-slate-400 sm:text-xs">
                        <span class="hidden sm:inline">Minggu</span>
                        <span class="sm:hidden">Min</span>
                    </div>
                </div>

                <!-- GENERATED CALENDAR -->
                <div id="calendarDays" class="grid grid-cols-7 gap-1 p-1.5 sm:gap-2 sm:p-5"></div>

                <!-- LEGEND -->
                <div class="flex flex-wrap items-center gap-3 border-t border-slate-100 px-3 py-3 sm:gap-4 sm:px-5 sm:py-4">
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="size-2 rounded-full bg-blue-600 sm:size-2.5"></span>

                        <span class="text-[9px] text-slate-500 sm:text-xs">
                            Ada event
                        </span>
                    </div>

                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="size-2 rounded-full border border-blue-600 bg-white sm:size-2.5 sm:border-2"></span>

                        <span class="text-[9px] text-slate-500 sm:text-xs">
                            Tanggal terpilih
                        </span>
                    </div>
                </div>

            </div>

           {{-- Agenda --}}
            <aside class="lg:col-span-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-sm sm:rounded-3xl sm:p-4 lg:sticky lg:top-24">

                    <!-- AGENDA HEADER -->
                    <div class="mb-2 border-b border-slate-100 pb-3 sm:mb-3 sm:pb-4">
                        <span class="text-[9px] font-bold tracking-wide text-blue-600 sm:text-xs">
                            Agenda Terpilih
                        </span>

                        <h2 id="selectedDateTitle" class="text-shadow mt-1 text-base! font-extrabold text-slate-900 sm:text-2xl! md:text-2xl">
                            Rabu, 15 Januari 2025
                        </h2>
                    </div>

                    <!-- AGENDA STATIC / BLADE -->
                    <div class="space-y-2 sm:space-y-3">

                        <!-- CARD 1 -->
                        <div class="group min-w-0 rounded-xl border border-slate-200 bg-slate-50 p-3 transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm sm:rounded-2xl sm:p-4">

                            <div class="mb-2 flex flex-col gap-1.5 sm:mb-3 sm:flex-row sm:items-center sm:justify-between sm:gap-2">
                                <span class="w-fit rounded-full bg-blue-50 px-2 py-1 text-[9px] font-semibold text-blue-600 sm:px-2.5 sm:text-xs">
                                    Seminar
                                </span>

                                <span class="text-[9px] text-slate-500 sm:text-xs">
                                    09:00 - 16:00 WIB
                                </span>
                            </div>

                            <h3 class="w-full truncate text-sm! font-bold leading-4 text-slate-900 sm:text-lg! sm:leading-5">
                                Seminar Analisis Kebijakan Lingkungan BRIN
                            </h3>

                            <div class="mt-1.5 flex min-w-0 items-start gap-1.5 sm:mt-2 sm:gap-2">
                                <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-3 shrink-0 object-contain sm:size-3.5" alt="Location">

                                <p class="m-0 min-w-0 truncate text-[9px] leading-4 text-slate-500 sm:text-xs sm:leading-5">
                                    Auditorium Utama BRIN, Jakarta Selatan
                                </p>
                            </div>

                        </div>

                        <!-- CARD 2 -->
                        <div class="group min-w-0 rounded-xl border border-slate-200 bg-slate-50 p-3 transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm sm:rounded-2xl sm:p-4">

                            <div class="mb-2 flex flex-col gap-1.5 sm:mb-3 sm:flex-row sm:items-center sm:justify-between sm:gap-2">
                                <span class="w-fit rounded-full bg-blue-50 px-2 py-1 text-[9px] font-semibold text-blue-600 sm:px-2.5 sm:text-xs">
                                    Pertemuan Inti
                                </span>

                                <span class="text-[9px] text-slate-500 sm:text-xs">
                                    14:00 - 15:30 WIB
                                </span>
                            </div>

                            <h3 class="w-full truncate text-sm! font-bold leading-4 text-slate-900 sm:text-lg! sm:leading-5">
                                Sesi Diskusi Internal Riset Sosial
                            </h3>

                            <div class="mt-1.5 flex min-w-0 items-start gap-1.5 sm:mt-2 sm:gap-2">
                                <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-3 shrink-0 object-contain sm:size-3.5" alt="Location">

                                <p class="m-0 min-w-0 truncate text-[9px] leading-4 text-slate-500 sm:text-xs sm:leading-5">
                                    R. Rapat Pleno Deputi II, Jakarta
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </aside>

        </div>
    </div>
</section>

@endsection
