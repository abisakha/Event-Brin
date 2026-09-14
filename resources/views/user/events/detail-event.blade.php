@extends('user.layouts.main')

@section('content')
    <main class="bg-slate-50 pb-16">
        <!-- HERO -->

    <section class="relative h-80 w-full overflow-hidden sm:h-96 lg:h-112">
        <img src="{{ asset('assets/images/card-image.png') }}" class="absolute inset-0 h-full w-full object-cover" alt="Event">
        <div class="absolute inset-0 bg-linear-to-t from-slate-900/30 via-transparent to-transparent"></div>
    </section>
    <!-- CONTENT -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid grid-cols-1 gap-8 py-8 lg:grid-cols-12">

            <!-- ================= LEFT CONTENT ================= -->
            <div class="lg:col-span-8">

                <!-- EVENT HEADER -->
                <div class="mb-6">
                    <div class="mb-4 flex flex-wrap gap-2">
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">Seminar</span>
                        <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-600">Kebijakan Lingkungan</span>
                    </div>

                    <h1 class="text-shadow mb-8 max-w-4xl text-2xl font-extrabold leading-tight text-slate-900 sm:text-3xl lg:text-4xl">
                        Seminar Analisis Kebijakan Lingkungan BRIN: Strategi Mitigasi Perubahan Iklim Global
                    </h1>

                    <div class="mt-5 flex flex-col gap-3 text-sm text-slate-600">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/calendar.png') }}" class="size-4 object-contain" alt="Date">
                            <span>Senin, 15 Januari 2025 • 09:00 - 16:00 WIB</span>
                        </div>

                        <div class="flex items-start gap-2">
                            <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-4 object-contain" alt="Location">
                            <span>Auditorium Utama BRIN, Jl. Gatot Subroto No. 10, Jakarta Selatan</span>
                        </div>
                    </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="border-t border-slate-200 pt-6">
                    <h2 class="mb-4 text-xl font-bold text-slate-900">Deskripsi Kegiatan</h2>

                    <div class="space-y-4 text-sm leading-7 text-slate-600">
                        <p>
                            Seminar nasional ini diselenggarakan oleh Deputi Kebijakan Riset BRIN untuk membahas analisis kebijakan lingkungan strategis di Indonesia. Fokus pembahasan meliputi integrasi sains dalam perancangan regulasi lingkungan, studi kasus pemulihan ekosistem pesisir, serta teknologi pemantauan emisi karbon berbasis IoT.
                        </p>

                        <p>
                            Kegiatan ini terbuka untuk akademisi, peneliti, perwakilan kementerian/lembaga, praktisi lingkungan, serta mahasiswa pascasarjana. Peserta terdaftar akan mendapatkan materi seminar, konsumsi, dan e-sertifikat yang diakui secara nasional.
                        </p>
                    </div>
                </div>

                <!-- EVENT INFO -->
                <div class=" mt-4 rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <h2 class="text-shadow mb-1 text-lg font-bold text-slate-900">Informasi Event</h2>
                    <div class="border-t border-slate-200"></div>
                    <div class="border-t border-slate-200 space-y-4 text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <span class="text-slate-500">Penyelenggara</span>
                            <span class="font-semibold text-slate-900 sm:text-right">Deputi Bidang Kebijakan Riset dan Inovasi BRIN</span>
                        </div>

                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <span class="text-slate-500">Narahubung</span>
                            <span class="font-semibold text-slate-900">Dr. Hendrawan (0812-3456-7890)</span>
                        </div>

                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <span class="text-slate-500">Kapasitas</span>
                            <span class="font-semibold text-slate-900">200 Peserta</span>
                        </div>

                        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                            <span class="text-slate-500">Sisa Kuota</span>
                            <span class="font-semibold text-emerald-600">45 kursi tersedia</span>
                        </div>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="mt-8">
                    <h2 class="text-shadow  mb-1 text-xl font-bold text-slate-900">Lokasi</h2>
                    <div class="border-t border-slate-200 mb-2"></div>

                    <div class="flex h-56 items-center justify-center overflow-hidden rounded-3xl bg-slate-200 sm:h-72">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/location.png') }}" class="mx-auto mb-2 size-7 object-contain" alt="Location">
                            <p class="text-sm font-medium text-slate-600">Auditorium Utama BRIN</p>
                            <p class="mt-1 text-xs text-slate-500">Jakarta Selatan</p>
                        </div>
                    </div>

                    <a href="#" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 no-underline! transition hover:text-blue-700">
                        <img src="{{ asset('assets/images/location.png') }}" class="size-4 object-contain" alt="">
                        Buka di Google Maps
                    </a>
                </div>

                <!-- ORGANIZER -->
                <div class="mt-8 rounded-3xl border border-blue-100 bg-gradient-to-r from-slate-100 to-blue-50 p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md sm:p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                        <div class="flex items-center gap-4 sm:flex-1">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-blue-600 font-bold text-white shadow-sm">
                                B
                            </div>
                            <div class="min-w-0">
                                <h3 class="truncate text-lg font-bold text-slate-900 sm:text-xl">
                                    Deputi Kebijakan Riset BRIN
                                </h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                                    Lembaga Pemerintah Pembina Riset & Inovasi Nasional
                                </p>
                            </div>
                        </div>
                        <a href="#" class="inline-flex h-10 w-full items-center justify-center rounded-full border border-blue-500 bg-white/70 px-5 text-sm font-semibold text-blue-600 no-underline! transition duration-300 hover:bg-blue-600 hover:text-white! hover:shadow-md sm:w-auto">
                            Lihat Profil
                        </a>
                    </div>
                </div>

            </div>

            <!-- ================= REGISTRATION ================= -->
            <aside class="lg:col-span-4">
                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-lg lg:sticky lg:top-24 sm:p-6">

                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">Pendaftaran Event</p>

                    <div class="mt-1 flex items-center justify-between gap-3">
                        <h2 class="text-3xl font-extrabold text-emerald-500">Gratis</h2>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">Kuota Terbatas</span>
                    </div>

                    <div class="my-2 border-t border-slate-100"></div>

                    <div class="mb-2 flex items-center justify-between gap-3 text-xs">
                        <span class="text-slate-500">Pendaftar saat ini</span>
                        <span class="font-bold text-slate-900">155 dari 200 Peserta</span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-4/5 rounded-full bg-blue-600"></div>
                    </div>

                    <button class="mt-5 h-11 w-full rounded-full bg-blue-600 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md active:scale-95">
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
<!-- ================= RELATED EVENTS ================= -->
<section class="mx-auto mt-8 max-w-7xl px-4 sm:px-6">
    <div class="pt-8">
        <h2 class="text-shadow mb-6 text-xl font-bold text-slate-900">More Events From Deputi Kebijakan Riset BRIN</h2>
        <div class="border-t border-slate-200 "></div>
        <div class="divide-y divide-slate-200">
            @for($i = 0; $i < 3; $i++)

            <article class="group grid grid-cols-1 gap-5 py-6 sm:grid-cols-12 sm:items-center">

                <!-- CONTENT -->
                <div class="sm:col-span-7">
                    <div class="mb-4 flex items-center justify-between gap-4">
                        <span class="rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">ONLINE</span>
                        <span class="text-xs font-semibold text-blue-600">22 May 2025</span>
                    </div>

                    <h3 class="mb-2 max-w-md text-base font-bold leading-5 text-slate-900 transition group-hover:text-blue-600">
                        IPB-BRIN Research Collaboration Webinar
                    </h3>

                    <div class="mb-4 flex items-center gap-1.5 text-xs text-slate-500">
                        <img src="{{ asset('assets/images/location.png') }}" class="size-3.5 object-contain" alt="Location">
                        <span>jakarta, Indonesia</span>
                    </div>

                    <a href="#" class="inline-flex h-10 items-center justify-center rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-700 no-underline! transition duration-300 hover:border-blue-500! hover:bg-blue-600! hover:text-white!">
                        View Details
                    </a>
                </div>

                <!-- IMAGE -->
                <div class="sm:col-span-5">
                    <div class="overflow-hidden rounded-xl">
                        <img src="{{ asset('assets/images/card-image.png') }}" class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" alt="Event">
                    </div>
                </div>

            </article>

            @endfor
        </div>
    </div>
</section>

</main>

@endsection
