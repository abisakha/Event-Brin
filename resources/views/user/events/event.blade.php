@extends('user.layouts.main')

@section('content')
    <section class="bg-slate-50 pb-16 pt-28">
        <div class="mx-auto max-w-7xl px-3 sm:px-6">
            <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-12">
                {{-- filter --}}
                <aside class="lg:col-span-3">
                    <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-lg sm:rounded-3xl sm:p-5 lg:sticky lg:top-24">

                        <form action="{{ route('event') }}" method="GET" id="filterForm">
                            <!-- MOBILE FILTER HEADER -->
                            <button type="button" id="mobileFilterToggle" aria-expanded="false" class="flex w-full items-center justify-between text-left lg:hidden">
                                <div class="min-w-0">
                                    <h3 class="m-0 text-sm! font-bold text-slate-900">
                                        Filter Event
                                    </h3>

                                    <p class="mt-1 truncate text-[10px] leading-4 text-slate-500">
                                        Temukan event sesuai kebutuhan Anda
                                    </p>
                                </div>

                                <svg id="mobileFilterIcon" class="ml-3 size-4 shrink-0 text-slate-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- DESKTOP HEADER -->
                            <div class="mb-4 hidden lg:block">
                                <h3 class="m-0 text-base! font-bold text-slate-900">
                                    Filter Event
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Temukan event sesuai kebutuhan Anda
                                </p>
                            </div>

                            <!-- FILTER CONTENT -->
                            <div id="mobileFilterContent" class="hidden lg:block">
                                <div class="mt-3 border-t border-slate-200 pt-3 lg:mt-0 lg:border-0 lg:pt-0">
                                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 sm:gap-4 lg:grid-cols-1">

                                        <!-- TANGGAL -->
                                        <div class="relative col-span-2 lg:col-span-1">
                                            <label class="mb-1.5 block text-[10px] font-semibold text-slate-700 sm:mb-2 sm:text-xs">
                                                Tanggal
                                            </label>

                                            <button type="button" id="dateRangeButton" class="flex h-8 w-full items-center justify-between rounded-xl! border border-slate-200 bg-slate-50 px-2.5 text-[10px] text-slate-500 transition hover:border-blue-500 hover:bg-white sm:h-10 sm:rounded-2xl! sm:px-3 sm:text-xs">
                                                <span id="dateRangeText" class="truncate">
                                                    Rentang Tanggal
                                                </span>

                                                <img src="{{ asset('assets/images/calendar.png') }}" class="size-3 shrink-0 object-contain sm:size-4" alt="Calendar">
                                            </button>

                                            <!-- POPUP DATE -->
                                            <div id="dateRangePanel" class="absolute left-0 top-full z-50 mt-2 hidden w-full rounded-xl border border-slate-200 bg-white p-3 shadow-xl sm:rounded-2xl sm:p-4">
                                                <div class="mb-3">
                                                    <label class="mb-1 block text-[10px] font-medium text-slate-600 sm:text-xs">
                                                        Tanggal Mulai
                                                    </label>

                                                    <input type="date" id="startDate" name="start_date" value="{{ request('start_date') }}" class="h-8 w-full cursor-pointer rounded-lg border border-slate-200 bg-white px-2 text-[10px] text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 sm:h-10 sm:rounded-xl sm:px-3 sm:text-xs">
                                                </div>

                                                <div class="mb-3 sm:mb-4">
                                                    <label class="mb-1 block text-[10px] font-medium text-slate-600 sm:text-xs">
                                                        Tanggal Selesai
                                                    </label>

                                                    <input type="date" id="endDate" name="end_date" value="{{ request('end_date') }}" class="h-8 w-full cursor-pointer rounded-lg border border-slate-200 bg-white px-2 text-[10px] text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 sm:h-10 sm:rounded-xl sm:px-3 sm:text-xs">
                                                </div>

                                                <div class="grid grid-cols-2 gap-2">
                                                    <button type="button" id="clearDate" class="h-8 rounded-lg border border-slate-200 bg-white text-[10px] font-medium text-slate-600 transition hover:bg-slate-50 sm:h-9 sm:rounded-xl sm:text-xs">
                                                        Reset
                                                    </button>

                                                    <button type="button" id="applyDate" class="h-8 rounded-lg bg-blue-600 text-[10px] font-semibold text-white transition hover:bg-blue-700 sm:h-9 sm:rounded-xl sm:text-xs">
                                                        Pilih
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- LOKASI -->
                                        <div>
                                            <label class="mb-1.5 block text-[10px] font-semibold text-slate-700 sm:mb-2 sm:text-xs">
                                                Lokasi
                                            </label>

                                            <div class="flex flex-wrap gap-1.5 sm:gap-2">
                                                @foreach ($locationAreas as $locationArea)
                                                    <label class="cursor-pointer">
                                                        {{-- checked sa,a kaya selested tapi ini untuk radio, berguna untuk mengecek dan membandingkan ketika click salatu satu inputnya, kalo true akan jadi selscted jadi ga hilang, dan bisa berubah warna --}}
                                                        <input type="radio" name="location_area" value="{{ $locationArea }}" class="peer hidden" @checked(request('location_area') == $locationArea)>
                                                        <span class="block rounded-xl! border border-slate-200 bg-white px-2 py-1.5 text-[9px] text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white peer-checked:border-blue-500 peer-checked:bg-blue-600! peer-checked:text-white sm:rounded-2xl! sm:px-3 sm:py-2 sm:text-xs">
                                                            {{ $locationArea }}
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- DEPUTI -->
                                        <div>
                                            <label class="mb-1.5 block text-[10px] font-semibold text-slate-700 sm:mb-2 sm:text-xs">
                                                Deputi Bidang
                                            </label>

                                            <select name="satker" class="h-8 w-full rounded-xl border border-slate-200 bg-slate-50 px-2 text-[10px] text-slate-600 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 sm:h-10 sm:rounded-2xl sm:px-3 sm:text-xs">
                                                <option value="" @selected(request('satker') === null || request('satker') === '')>Semua Satker</option>

                                                @foreach ($satkers as $satker)

                                                    {{-- seleted berfungsi untuk memperthankan requse setelah di kirim, karna akan reload sehinhgga akan hilang kalo ga apaki items-baseline
                                                    dengan cara membandingkan request dengan db jika true maka akan mengahasil selected dan ada kaya historinya intinya lah
                                                    string mengubah type data db agar sama dengan request--}}
                                                    <option value="{{ $satker->id }}" @selected((string) request('satker') === (string) $satker->id)>
                                                        {{ $satker->unit_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- BULAN -->
                                        <div>
                                            <label class="mb-1.5 block text-[10px] font-semibold text-slate-700 sm:mb-2 sm:text-xs">
                                                Bulan
                                            </label>

                                            <select id="monthFilter" name="month" class="h-8 w-full cursor-pointer rounded-xl border border-slate-200 bg-slate-50 px-2 text-[10px] text-slate-600 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 sm:h-10 sm:rounded-2xl sm:px-3 sm:text-xs">
                                                <option value="">Semua Bulan</option>
                                                {{-- sama kaya atas --}}
                                                <option value="1" @selected(request('month') == '1')>Januari</option>
                                                <option value="2" @selected(request('month') == '2')>Februari</option>
                                                <option value="3" @selected(request('month') == '3')>Maret</option>
                                                <option value="4" @selected(request('month') == '4')>April</option>
                                                <option value="5" @selected(request('month') == '5')>Mei</option>
                                                <option value="6" @selected(request('month') == '6')>Juni</option>
                                                <option value="7" @selected(request('month') == '7')>Juli</option>
                                                <option value="8" @selected(request('month') == '8')>Agustus</option>
                                                <option value="9" @selected(request('month') == '9')>September</option>
                                                <option value="10" @selected(request('month') == '10')>Oktober</option>
                                                <option value="11" @selected(request('month') == '11')>November</option>
                                                <option value="12" @selected(request('month') == '12')>Desember</option>
                                            </select>
                                        </div>

                                        <!-- KATEGORI -->
                                        <div>
                                            <label class="mb-1.5 block text-[10px] font-semibold text-slate-700 sm:mb-2 sm:text-xs">
                                                Kategori
                                            </label>

                                            <div class="grid grid-cols-2 gap-1">
                                                <label class="flex cursor-pointer items-center gap-1.5 rounded-lg px-1 py-1 text-[9px] text-slate-600 transition hover:bg-blue-50 sm:gap-2 sm:px-2 sm:py-1.5 sm:text-xs">
                                                    <input type="checkbox" name="formats[]" value="offline" @checked(in_array('offline', request('formats', []))) class="size-3 rounded border-slate-300 text-blue-600 focus:ring-blue-500 sm:size-4">
                                                    Offline
                                                </label>

                                                <label class="flex cursor-pointer items-center gap-1.5 rounded-lg px-1 py-1 text-[9px] text-slate-600 transition hover:bg-blue-50 sm:gap-2 sm:px-2 sm:py-1.5 sm:text-xs">
                                                    <input type="checkbox" name="formats[]" value="online" @checked(in_array('online', request('formats', []))) class="size-3 rounded border-slate-300 text-blue-600 focus:ring-blue-500 sm:size-4">
                                                    Online
                                                </label>
                                            </div>
                                        </div>

                                        <!-- ACTION -->
                                        <div class="grid grid-cols-2 gap-2">
                                           <button type="submit" id="applyFilter" class="h-8 rounded-xl! bg-blue-600 text-[10px] font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95 sm:h-10 sm:rounded-2xl! sm:text-sm">
                                                Terapkan
                                            </button>

                                            <a href="{{ route('event') }}" id="resetFilter" class="flex h-8 items-center justify-center rounded-xl! border border-blue-500 bg-white text-[10px] font-medium text-blue-600 !no-underline transition hover:bg-blue-50 active:scale-95 sm:h-10 sm:rounded-2xl! sm:text-sm">
                                                Reset Filter
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </aside>

                {{-- event List --}}
                <div class="lg:col-span-9">

                    <!-- HEADER -->
                    <div class="mb-3 flex items-center justify-between gap-3 sm:mb-4">
                        <div class="flex min-w-0 items-baseline gap-1.5 sm:gap-2">
                            <strong class="text-lg font-extrabold text-slate-900 sm:text-2xl">
                                {{ $events->total() }}
                            </strong>

                            <span class="truncate text-xs! text-slate-500 sm:text-base!">
                                event ilmiah ditemukan
                            </span>
                        </div>

                        <!-- SORT -->
                        <div class="flex shrink-0 items-center gap-2">
                            <span class="hidden text-sm! font-medium text-slate-500 sm:block">
                                Urutkan:
                            </span>

                            <select name="sort" form="filterForm" id="sortFilter" class="h-8 min-w-24 cursor-pointer rounded-lg border border-slate-200 bg-white px-2 text-[10px] font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 sm:h-10 sm:min-w-36 sm:rounded-xl sm:px-3 sm:text-sm">
                                <option value="latest" @selected(request('sort', 'latest') === 'latest')>Terbaru</option>
                                <option value="oldest" @selected(request('sort') === 'oldest')>Terlama</option>
                                <option value="popular" @selected(request('sort') === 'popular')>Terpopuler</option>
                            </select>
                        </div>
                    </div>

                    <!-- EVENT CARDS -->
                    <div class="grid grid-cols-2 gap-3 sm:gap-5 md:grid-cols-2">

                        @forelse($events as $event)
                            <article class="group min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg sm:rounded-3xl">

                                <div class="h-24 overflow-hidden sm:h-44">
                                    <img src="{{ $event->event_image }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="Event">
                                </div>

                                <div class="p-2.5 sm:p-4">

                                    <div class="mb-2 flex items-center justify-between gap-1 sm:mb-3">
                                        <span class="truncate rounded-full bg-blue-50 px-2 py-1 text-[8px] font-semibold text-blue-600 sm:px-3 sm:text-xs">
                                            {{ $event->format }}
                                        </span>

                                        <span class="shrink-0 rounded-full bg-emerald-50 px-2 py-1 text-[8px] font-semibold text-emerald-600 sm:px-3 sm:text-xs">
                                            {{ $event->quota }} Quota
                                        </span>
                                    </div>

                                    <h3 title="{{ $event->event_name }}" class="mb-2 truncate text-xs! font-bold leading-4 text-slate-900 transition group-hover:text-blue-600 sm:mb-3 sm:text-lg! sm:leading-6">
                                        {{ $event->event_name }}
                                    </h3>

                                    <div class="mb-1 flex min-w-0 items-center gap-1 text-[9px] text-slate-500 sm:mb-1.5 sm:gap-2 sm:text-xs">
                                        <img src="{{ asset('assets/images/calendar.png') }}" class="size-3 shrink-0 object-contain sm:size-4" alt="Date">

                                        <span class="truncate">
                                            {{ $event->start_date->format('d M Y') }}
                                        </span>
                                    </div>

                                    <div class="mb-2 flex min-w-0 items-center gap-1 text-[9px] text-slate-500 sm:mb-3 sm:gap-2 sm:text-xs">
                                        <img src="{{ asset('assets/images/location.png') }}" class="size-3 shrink-0 object-contain sm:size-4" alt="Location">

                                        <span class="truncate">
                                            {{ $event->format === 'online' ? 'Online Webinar' : $event->location }}
                                        </span>
                                    </div>

                                    <a href="#" class="flex h-8 w-full items-center justify-center rounded-full bg-blue-600 px-2 text-[9px] font-semibold text-white !no-underline shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md active:scale-95 sm:h-10 sm:text-sm">
                                        <span class="truncate">
                                            Daftar Sekarang
                                        </span>
                                    </a>
                                </div>
                            </article>
                        @empty
                            <p>Tidak ada event ditemukan.</p>
                        @endforelse

                    </div>

                    {{-- pagnnation --}}
                    <div class="mt-6 flex flex-col items-center justify-between gap-3 sm:mt-8 sm:flex-row sm:gap-4">
                        <p class="m-0 text-[10px] text-slate-500 sm:text-xs">
                            Menampilkan {{ $events->firstItem() ?? 0 }}–{{ $events->lastItem() ?? 0 }} dari {{ $events->total() }} event
                        </p>

                        <div class="flex items-center gap-1.5 sm:gap-2">
                            {{ $events->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
