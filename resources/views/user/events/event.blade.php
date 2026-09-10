@extends('user.layouts.main')


@section('content')
<section class="bg-slate-50 pb-16 pt-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <!-- ================= FILTER ================= -->
            <aside class="lg:col-span-3">
                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-lg lg:sticky lg:top-24">

                    <!-- HEADER -->
                    <div class="mb-4">
                        <h3 class="m-0 text-xl font-bold text-slate-900">Filter Event</h3>
                        <p class="mt-1 text-xs leading-5 text-slate-500">Temukan event sesuai kebutuhan Anda</p>
                    </div>

                    <!-- CONTENT -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-1">


                    <!-- TANGGAL -->
                    <div class="relative border-t border-slate-200 pt-4">
                        <label class="mb-2 block text-xs font-semibold text-slate-700">Tanggal</label>

                        <button type="button" id="dateRangeButton" class="flex h-10 w-full items-center justify-between rounded-2xl! border border-slate-200 bg-slate-50 px-3 text-xs text-slate-500 transition hover:border-blue-500 hover:bg-white">
                            <span id="dateRangeText">Rentang Tanggal</span>
                            <img src="{{ asset('assets/images/calendar.png') }}" class="size-4 object-contain" alt="Calendar">
                        </button>

                        <!-- POPUP DATE -->
                        <div id="dateRangePanel" class="absolute left-0 top-full z-50 mt-2 hidden w-full rounded-2xl border border-slate-200 bg-white p-4 shadow-xl">
                            <div class="mb-3">
                                <label class="mb-1 block text-xs font-medium text-slate-600">Tanggal Mulai</label>
                                <input type="date" id="startDate" name="start_date" class="h-10 w-full cursor-pointer rounded-xl border border-slate-200 bg-white px-3 text-xs text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="mb-4">
                                <label class="mb-1 block text-xs font-medium text-slate-600">Tanggal Selesai</label>
                                <input type="date" id="endDate" name="end_date" class="h-10 w-full cursor-pointer rounded-xl border border-slate-200 bg-white px-3 text-xs text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <button type="button" id="clearDate" class="h-9 rounded-xl border border-slate-200 bg-white text-xs font-medium text-slate-600 transition hover:bg-slate-50">
                                    Reset
                                </button>

                                <button type="button" id="applyDate" class="h-9 rounded-xl bg-blue-600 text-xs font-semibold text-white transition hover:bg-blue-700">
                                    Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                        <!-- LOKASI -->
                        <div class="sm:pt-4 lg:pt-0">
                            <label class="mb-2 block text-xs font-semibold text-slate-700">Lokasi</label>
                            <div class="flex flex-wrap gap-2">
                                <button class="rounded-2xl! border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white">Jakarta</button>
                                <button class="rounded-2xl! border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white">Bandung</button>
                                <button class="rounded-2xl! border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white">Bogor</button>
                                <button class="rounded-2xl! border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white">Online</button>
                                <button class="rounded-2xl! border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 transition hover:border-blue-500 hover:bg-blue-600! hover:text-white">Hybrid</button>
                            </div>
                        </div>

                        <!-- DEPUTI -->
                        <div>
                            <label class="mb-2 block text-xs font-semibold text-slate-700">Deputi Bidang</label>
                            <select class="h-10 w-full rounded-2xl border border-slate-200 bg-slate-50 px-3 text-xs text-slate-600 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
                                <option>Kebijakan Riset & Inovasi</option>
                                <option>Infrastruktur Riset</option>
                                <option>Sumber Daya Manusia</option>
                            </select>
                        </div>

                        <!-- BULAN -->
                        <div>
                            <label class="mb-2 block text-xs font-semibold text-slate-700">Bulan</label>

                            <select id="monthFilter" name="month" class="h-10 w-full cursor-pointer rounded-2xl border border-slate-200 bg-slate-50 px-3 text-xs text-slate-600 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
                                <option value="">Semua Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <!-- KATEGORI -->
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="mb-2 block text-xs font-semibold text-slate-700">Kategori</label>
                            <div class="grid grid-cols-2 gap-1 lg:grid-cols-1">
                                <label class="flex cursor-pointer items-center gap-2 rounded-lg px-2 py-1.5 text-xs text-slate-600 transition hover:bg-blue-50">
                                    <input type="checkbox" class="size-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    Seminar
                                </label>

                                <label class="flex cursor-pointer items-center gap-2 rounded-lg px-2 py-1.5 text-xs text-slate-600 transition hover:bg-blue-50">
                                    <input type="checkbox" class="size-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    Workshop
                                </label>

                                <label class="flex cursor-pointer items-center gap-2 rounded-lg px-2 py-1.5 text-xs text-slate-600 transition hover:bg-blue-50">
                                    <input type="checkbox" class="size-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    Konferensi
                                </label>

                                <label class="flex cursor-pointer items-center gap-2 rounded-lg px-2 py-1.5 text-xs text-slate-600 transition hover:bg-blue-50">
                                    <input type="checkbox" class="size-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    Webinar
                                </label>
                            </div>
                        </div>

                        <!-- ACTION -->
                        <div class="grid grid-cols-2 gap-2 lg:grid-cols-1">
                            <button type="button" id="applyFilter" class="h-10 rounded-2xl! bg-blue-600 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                                Terapkan
                            </button>

                            <button type="button" id="resetFilter" class="h-10 rounded-2xl! border border-blue-500 bg-white text-sm font-medium text-blue-600 transition hover:bg-blue-50 active:scale-95">
                                Reset Filter
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- ================= EVENT LIST ================= -->
            <div class="lg:col-span-9">

                <!-- HEADER -->
                <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-baseline gap-2">
                        <strong class="text-2xl font-extrabold text-slate-900">24</strong>
                        <span class="text-base! text-slate-500">event ilmiah ditemukan</span>
                    </div>

                    <!-- SORT -->
                    <div class="flex items-center gap-2">
                        <span class="hidden text-sm! font-medium text-slate-500 sm:block">Urutkan:</span>

                        <select class="h-10 min-w-36 cursor-pointer rounded-xl border border-slate-200 bg-white px-3 text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option>Terbaru</option>
                            <option>Terlama</option>
                            <option>Terpopuler</option>
                        </select>
                    </div>
                </div>

                <!-- EVENT CARDS -->
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    @for($i = 0; $i < 6; $i++)
                    <article class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                        <div class="h-40 overflow-hidden sm:h-44">
                            <img src="{{ asset('assets/images/card-image.png') }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="Event">
                        </div>

                        <div class="p-4">
                            <div class="mb-3 flex items-center justify-between">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                                    {{ $i % 2 == 0 ? 'Seminar' : 'Workshop' }}
                                </span>

                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">Gratis</span>
                            </div>

                            <h3 class="mb-3 line-clamp-2 text-lg! font-bold leading-6 text-slate-900 transition group-hover:text-blue-600">
                                {{ $i % 2 == 0 ? 'Seminar Analisis Kebijakan Lingkungan BRIN' : 'Workshop Pengelolaan Data Riset Astronomi' }}
                            </h3>

                            <div class="mb-1.5 flex items-center gap-2 text-xs text-slate-500">
                                <img src="{{ asset('assets/images/calendar.png') }}" class="size-4 object-contain" alt="Date">
                                <span>15 Jan 2025</span>
                            </div>

                            <div class="mb-3 flex items-center gap-2 text-xs text-slate-500">
                                <img src="{{ asset('assets/images/location.png') }}" class="size-4 object-contain" alt="Location">
                                <span>Gedung BJ Habibie, Jakarta</span>
                            </div>

                            <a href="#" class="flex h-10 w-full items-center justify-center rounded-full bg-blue-600 text-sm font-semibold text-white !no-underline shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md active:scale-95">
                                Daftar Sekarang
                            </a>
                        </div>

                    </article>
                    @endfor

                </div>

                <!-- ================= PAGINATION ================= -->
                <div class="mt-8 flex flex-col items-center justify-between gap-4 sm:flex-row">
                    <p class="m-0 text-xs text-slate-500">Menampilkan 1–6 dari 24 event</p>

                    <div class="flex items-center gap-2">
                        <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-500 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">‹</button>

                        <button class="flex size-9 items-center justify-center rounded-xl bg-blue-600 text-sm font-semibold text-white shadow-sm">1</button>

                        <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">2</button>

                        <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">3</button>

                        <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">4</button>

                        <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-500 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">›</button>
                    </div>
                </div>

                {{-- NANTI KETIKA SUDAH PAKAI PAGINATION LARAVEL:
                    {{ $events->links() }}
                --}}

            </div>
        </div>
    </div>
</section>

@endsection
