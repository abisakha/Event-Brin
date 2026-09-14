@extends('user.layouts.main')

@section('content')
<section class="min-h-screen bg-white pb-10 pt-28">
    <div class="mx-auto w-11/12 max-w-7xl">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div>
                <h1 class="text-shadow text-2xl font-bold text-slate-900 sm:text-3xl">Notification</h1>
                <p class="mt-1 text-sm text-slate-500">Pantau status pendaftaran, pengingat jadwal event, dan info terbaru</p>
            </div>
        </div>

       <div class="mb-2 flex items-center justify-between rounded-xl bg-white p-2">
            <div class="flex overflow-x-auto">
                <button class="flex items-center gap-2 rounded-3xl! border border-blue-800 bg-blue-50 px-5 py-2 text-sm font-semibold text-blue-600 transition hover:bg-blue-100">
                    Semua <span class="rounded-full bg-blue-600 px-2 text-xs text-white">8</span>
                </button>

                <button class="flex items-center gap-2 rounded-3xl! px-5 py-2 text-sm text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                    Belum Dibaca <span class="rounded-full bg-slate-100 px-2 text-xs text-slate-600">2</span>
                </button>

                <button class="flex items-center gap-2 rounded-3xl! px-5 py-2 text-sm text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                    Event <span class="rounded-full bg-slate-100 px-2 text-xs text-slate-600">4</span>
                </button>

                <button class="flex items-center gap-2 rounded-3xl! px-5 py-2 text-sm text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                    Sistem <span class="rounded-full bg-slate-100 px-2 text-xs text-slate-600">2</span>
                </button>
            </div>

            <button class="ml-4 whitespace-nowrap text-sm! font-medium text-black-200 transition hover:text-blue-700">
                Tandai Semua Dibaca
            </button>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            @php
            $notifications=[
            ['title'=>'Pendaftaran Berhasil','desc'=>'Selamat! Pendaftaran Anda untuk "Seminar Analisis Kebijakan Lingkungan BRIN" telah dikonfirmasi. Nomor Registrasi Anda adalah REG-2025-00142.','time'=>'2 jam yang lalu','icon'=>'✓','color'=>'bg-emerald-100 text-emerald-600'],
            ['title'=>'Pengingat: Event Dimulai Besok','desc'=>'Jangan lupa, besok adalah hari pelaksanaan "Seminar Analisis Kebijakan Lingkungan" pukul 09:00 WIB di Auditorium Utama BRIN, Jakarta.','time'=>'Kemarin','icon'=>'▣','color'=>'bg-blue-100 text-blue-600'],
            ['title'=>'Isi Survei Kepuasan','desc'=>'Silakan luangkan waktu sejenak untuk mengisi survei kepuasan kegiatan "Workshop Pengelolaan Data Riset Astronomi" guna penerbitan sertifikat.','time'=>'2 hari yang lalu','icon'=>'□','color'=>'bg-yellow-100 text-yellow-600'],
            ['title'=>'Sertifikat E-Sertifikat Tersedia','desc'=>'Sertifikat kehadiran Anda untuk "Konferensi Nasional Inovasi Pangan Lokal" sudah diterbitkan. Silakan unduh melalui halaman profil Anda.','time'=>'3 hari yang lalu','icon'=>'♙','color'=>'bg-purple-100 text-purple-600'],
            ['title'=>'Perubahan Lokasi Event','desc'=>'Pemberitahuan perubahan ruangan untuk "Webinar Teknologi Akselerator Partikel". Tautan ruang pertemuan Zoom telah diperbarui.','time'=>'5 hari yang lalu','icon'=>'i','color'=>'bg-red-100 text-red-600'],
            ['title'=>'Pendaftaran Berhasil','desc'=>'Anda telah terdaftar sebagai peserta "Workshop Pengelolaan Data Riset Astronomi" pada tanggal 18 Jan 2025.','time'=>'1 minggu yang lalu','icon'=>'✓','color'=>'bg-emerald-100 text-emerald-600'],
            ['title'=>'Event Baru Deputi Kebijakan Riset','desc'=>'Kegiatan baru telah diterbitkan: "Simposium Nasional Penerapan Teknologi IoT" sedang membuka pendaftaran peserta gratis.','time'=>'1 minggu yang lalu','icon'=>'▣','color'=>'bg-blue-100 text-blue-600']
            ];
            @endphp

            @foreach($notifications as $item)
            <div class="group flex gap-4 border-b border-slate-100 bg-white p-5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:shadow-lg last:border-none sm:p-6">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full {{ $item['color'] }} font-semibold transition duration-300 group-hover:bg-blue-400 group-hover:text-blue-600!">
                    {{ $item['icon'] }}
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h3 class="text-lg! font-semibold text-slate-900 transition duration-300 group-hover:text-white sm:text-base">
                                {{ $item['title'] }}
                            </h3>

                            <p class="mt-1 text-sm! leading-relaxed text-slate-500 transition duration-300 group-hover:text-blue-400!">
                                {{ $item['desc'] }}
                            </p>
                        </div>

                        <span class="whitespace-nowrap text-xs text-slate-400 transition duration-300 group-hover:text-blue-400">
                            {{ $item['time'] }}
                        </span>
                    </div>
                </div>

                <button class="hidden text-slate-400 transition duration-300 group-hover:text-white sm:block">
                    ⋮
                </button>

            </div>
            @endforeach
</div>
    </div>
</section>
@endsection
