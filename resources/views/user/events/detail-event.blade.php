@extends('user.layouts.main')

@section('content')
<main class="bg-slate-50 pb-12 sm:pb-16">

    <!-- HERO -->
    <section class="relative h-52 w-full overflow-hidden sm:h-96 lg:h-112">
        <img src="{{ asset('assets/images/card-image.png') }}" class="absolute inset-0 h-full w-full object-cover" alt="Event">
        <div class="absolute inset-0 bg-linear-to-t from-slate-900/30 via-transparent to-transparent"></div>
    </section>

    <!-- CONTENT -->
    <section class="mx-auto max-w-7xl px-3 sm:px-6">
        <div class="grid grid-cols-1 gap-5 py-5 sm:gap-8 sm:py-8 lg:grid-cols-12">

            {{-- left content --}}
            <div class="lg:col-span-8">

                <!-- EVENT HEADER -->
                <div class="mb-4 sm:mb-6">
                    <div class="mb-3 flex flex-wrap gap-1.5 sm:mb-4 sm:gap-2">
                        <span class="rounded-full bg-blue-50 px-2 py-1 text-[9px] font-semibold text-blue-600 sm:px-3 sm:text-xs">
                            Seminar
                        </span>

                        <span class="rounded-full border border-slate-200 bg-white px-2 py-1 text-[9px] font-semibold text-slate-600 sm:px-3 sm:text-xs">
                            Kebijakan Lingkungan
                        </span>
                    </div>

                    <h1 class="text-shadow mb-4 text-lg font-extrabold leading-snug text-slate-900 sm:mb-8 sm:max-w-4xl sm:text-3xl sm:leading-tight lg:text-4xl">
                        Seminar Analisis Kebijakan Lingkungan BRIN: Strategi Mitigasi Perubahan Iklim Global
                    </h1>

                    <div class="mt-3 flex flex-col gap-2 text-[10px] text-slate-600 sm:mt-5 sm:gap-3 sm:text-sm">

                        <!-- DATE + MOBILE REGISTER -->
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex min-w-0 items-center gap-1.5 sm:gap-2">
                                <img src="{{ asset('assets/images/calendar.png') }}" class="size-3 shrink-0 object-contain sm:size-4" alt="Date">

                                <span class="min-w-0">
                                    Senin, 15 Januari 2025 • 09:00 - 16:00 WIB
                                </span>
                            </div>

                            <!-- MOBILE ONLY -->
                            <button type="button" class="inline-flex h-7 shrink-0 items-center justify-center rounded-full! bg-blue-600 px-3 text-[9px] font-semibold text-white shadow-sm transition hover:bg-blue-700 active:scale-95 lg:hidden">
                                Daftar
                            </button>
                        </div>

                        <!-- LOCATION -->
                        <div class="flex items-start gap-1.5 sm:gap-2">
                            <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-3 shrink-0 object-contain sm:size-4" alt="Location">

                            <span>
                                Auditorium Utama BRIN, Jl. Gatot Subroto No. 10, Jakarta Selatan
                            </span>
                        </div>
                    </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="border-t border-slate-200 pt-4 sm:pt-6">
                    <h2 class="mb-2 text-base font-bold text-slate-900 sm:mb-4 sm:text-xl">
                        Deskripsi Kegiatan
                    </h2>

                    <div class="space-y-3 text-[10px] leading-5 text-slate-600 sm:space-y-4 sm:text-sm sm:leading-7">
                        <p>
                            Seminar nasional ini diselenggarakan oleh Deputi Kebijakan Riset BRIN untuk membahas analisis kebijakan lingkungan strategis di Indonesia. Fokus pembahasan meliputi integrasi sains dalam perancangan regulasi lingkungan, studi kasus pemulihan ekosistem pesisir, serta teknologi pemantauan emisi karbon berbasis IoT.
                        </p>

                        <p>
                            Kegiatan ini terbuka untuk akademisi, peneliti, perwakilan kementerian/lembaga, praktisi lingkungan, serta mahasiswa pascasarjana. Peserta terdaftar akan mendapatkan materi seminar, konsumsi, dan e-sertifikat yang diakui secara nasional.
                        </p>
                    </div>
                </div>

                <!-- EVENT INFO -->
                <div class="mt-4 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm sm:rounded-3xl sm:p-6">
                    <h2 class="text-shadow mb-1 text-sm font-bold text-slate-900 sm:text-lg">
                        Informasi Event
                    </h2>

                    <div class="border-t border-slate-200"></div>

                    <div class="space-y-2.5 pt-3 text-[10px] sm:space-y-4 sm:text-sm">
                        <div class="flex items-start justify-between gap-4 sm:items-center">
                            <span class="shrink-0 text-slate-500">
                                Penyelenggara
                            </span>

                            <span class="text-right font-semibold text-slate-900">
                                Deputi Bidang Kebijakan Riset dan Inovasi BRIN
                            </span>
                        </div>

                        <div class="flex items-start justify-between gap-4 sm:items-center">
                            <span class="shrink-0 text-slate-500">
                                Narahubung
                            </span>

                            <span class="text-right font-semibold text-slate-900">
                                Dr. Hendrawan (0812-3456-7890)
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">
                                Kapasitas
                            </span>

                            <span class="font-semibold text-slate-900">
                                200 Peserta
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">
                                Sisa Kuota
                            </span>

                            <span class="font-semibold text-emerald-600">
                                45 kursi tersedia
                            </span>
                        </div>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="mt-5 sm:mt-8">
                    <h2 class="text-shadow mb-1 text-base font-bold text-slate-900 sm:text-xl">
                        Lokasi
                    </h2>

                    <div class="mb-2 border-t border-slate-200"></div>

                    <div class="flex h-36 items-center justify-center overflow-hidden rounded-2xl bg-slate-200 sm:h-72 sm:rounded-3xl">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/location.png') }}" class="mx-auto mb-1.5 size-5 object-contain sm:mb-2 sm:size-7" alt="Location">

                            <p class="text-[10px] font-medium text-slate-600 sm:text-sm">
                                Auditorium Utama BRIN
                            </p>

                            <p class="mt-1 text-[9px] text-slate-500 sm:text-xs">
                                Jakarta Selatan
                            </p>
                        </div>
                    </div>

                    <a href="#" class="mt-2 inline-flex items-center gap-1.5 text-[10px] font-semibold text-blue-600 no-underline! transition hover:text-blue-700 sm:mt-3 sm:gap-2 sm:text-sm">
                        <img src="{{ asset('assets/images/location.png') }}" class="size-3 object-contain sm:size-4" alt="">
                        Buka di Google Maps
                    </a>
                </div>

                <!-- ORGANIZER -->
                <div class="mt-5 rounded-2xl border border-blue-100 bg-gradient-to-r from-slate-100 to-blue-50 p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md sm:mt-8 sm:rounded-3xl sm:p-6">
                    <div class="flex items-center gap-3 sm:gap-4">

                        <div class="flex min-w-0 flex-1 items-center gap-3 sm:gap-4">
                            <div class="flex size-9 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-xs font-bold text-white shadow-sm sm:size-12 sm:rounded-2xl sm:text-base">
                                B
                            </div>

                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-bold text-slate-900 sm:text-xl">
                                    Deputi Kebijakan Riset BRIN
                                </h3>

                                <p class="mt-0.5 truncate text-[9px] text-slate-500 sm:mt-1 sm:text-sm">
                                    Lembaga Pemerintah Pembina Riset & Inovasi Nasional
                                </p>
                            </div>
                        </div>

                        <a href="#" class="inline-flex h-8 shrink-0 items-center justify-center rounded-full border border-blue-500 bg-white/70 px-3 text-[9px] font-semibold text-blue-600 no-underline! transition duration-300 hover:bg-blue-600 hover:text-white! hover:shadow-md sm:h-10 sm:px-5 sm:text-sm">
                            View Events
                        </a>
                    </div>
                </div>

            </div>

            {{-- registration Dekstop --}}
            <aside class="hidden lg:col-span-4 lg:block">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg lg:sticky lg:top-24">

                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">
                        Pendaftaran Event
                    </p>

                    <div class="mt-1 flex items-center justify-between gap-3">
                        <h2 class="text-3xl font-extrabold text-emerald-500">
                            Gratis
                        </h2>

                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                            Kuota Terbatas
                        </span>
                    </div>

                    <div class="my-2 border-t border-slate-100"></div>

                    <div class="mb-2 flex items-center justify-between gap-3 text-xs">
                        <span class="text-slate-500">
                            Pendaftar saat ini
                        </span>

                        <span class="font-bold text-slate-900">
                            155 dari 200 Peserta
                        </span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-4/5 rounded-full! bg-blue-600"></div>
                    </div>

                    <button class="mt-5 h-11 w-full rounded-full! bg-blue-600 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md active:scale-95">
                        Daftar Sekarang
                    </button>

                    <div class="mt-3 grid grid-cols-2 gap-2">
                        <button class="flex h-10 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white text-sm font-medium text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5v14l7-4 7 4V5H5z"/>
                            </svg>
                            Simpan
                        </button>

                        <button class="flex h-10 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white text-sm font-medium text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.684 13.342C8.886 12.938 9 12.482 9 12s-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.368-2.684 3 3 0 00-5.368 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            Bagikan
                        </button>
                    </div>

                </div>
            </aside>

        </div>
    </section>

    {{-- related event --}}
    <section class="mx-auto mt-5 max-w-7xl px-3 sm:mt-8 sm:px-6">
        <div class="pt-5 sm:pt-8">

            <h2 class="text-shadow mb-3 text-base font-bold text-slate-900 sm:mb-6 sm:text-xl">
                More Events From Deputi Kebijakan Riset BRIN
            </h2>

            <div class="border-t border-slate-200"></div>

            <div class="divide-y divide-slate-200">
                @for($i = 0; $i < 3; $i++)

                    <article class="group grid grid-cols-12 gap-3 py-4 sm:gap-5 sm:py-6 sm:items-center">

                        <!-- CONTENT -->
                        <div class="col-span-7 sm:col-span-7">
                            <div class="mb-2 flex items-center justify-between gap-2 sm:mb-4 sm:gap-4">
                                <span class="rounded-md bg-blue-50 px-1.5 py-1 text-[8px] font-semibold text-blue-600 sm:px-2 sm:text-xs">
                                    ONLINE
                                </span>

                                <span class="truncate text-[8px] font-semibold text-blue-600 sm:text-xs">
                                    22 May 2025
                                </span>
                            </div>

                            <h3
                                title="IPB-BRIN Research Collaboration Webinar"
                                class="mb-1.5 w-full truncate text-[10px]! font-bold leading-3.5 text-slate-900 transition group-hover:text-blue-600 sm:mb-2 sm:max-w-md sm:text-base! sm:leading-5"
                            >
                                IPB-BRIN Research Collaboration Webinar
                            </h3>

                            <div class="mb-2 flex min-w-0 items-center gap-1 text-[9px] text-slate-500 sm:mb-4 sm:gap-1.5 sm:text-xs">
                                <img src="{{ asset('assets/images/location.png') }}" class="size-3 shrink-0 object-contain sm:size-3.5" alt="Location">

                                <span class="truncate">
                                    Jakarta, Indonesia
                                </span>
                            </div>

                            <a href="#" class="inline-flex h-7 items-center justify-center rounded-lg border border-slate-200 bg-white px-3 text-[9px] font-semibold text-slate-700 no-underline! transition duration-300 hover:border-blue-500! hover:bg-blue-600! hover:text-white! sm:h-10 sm:rounded-xl sm:px-5 sm:text-sm">
                                View Details
                            </a>
                        </div>

                        <!-- IMAGE -->
                        <div class="col-span-5 sm:col-span-5">
                            <div class="overflow-hidden rounded-xl">
                                <img src="{{ asset('assets/images/card-image.png') }}" class="h-24 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-44" alt="Event">
                            </div>
                        </div>

                    </article>

                @endfor
            </div>
        </div>
    </section>

</main>
@endsection
