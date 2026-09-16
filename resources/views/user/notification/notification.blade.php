@extends('user.layouts.main')
@section('content')
    <section class="min-h-screen bg-white pb-24 pt-24 sm:pb-12 sm:pt-28">
        <div class="mx-auto w-11/12 max-w-7xl">

            {{-- header --}}
            <div class="mb-5 sm:mb-7">
                <h1 class="text-shadow text-xl! font-bold text-slate-900 sm:text-3xl!">
                    Notification
                </h1>

                <p class="mt-1 max-w-2xl text-[10px]! leading-4 text-slate-500 sm:text-sm! sm:leading-5">
                    Pantau status pendaftaran, pengingat jadwal event, dan info terbaru
                </p>
            </div>

            @php
                $notifications=[
                    [
                        'title'=>'Pendaftaran Berhasil',
                        'desc'=>'Selamat! Pendaftaran Anda untuk "Seminar Analisis Kebijakan Lingkungan BRIN" telah dikonfirmasi. Nomor Registrasi Anda adalah REG-2025-00142.',
                        'time'=>'16 Sep 2026 • 12:10',
                        'icon'=>'✓',
                        'color'=>'bg-emerald-100 text-emerald-600',
                        'read'=>false
                    ],
                    [
                        'title'=>'Pengingat: Event Dimulai Besok',
                        'desc'=>'Jangan lupa, besok adalah hari pelaksanaan "Seminar Analisis Kebijakan Lingkungan" pukul 09:00 WIB di Auditorium Utama BRIN, Jakarta.',
                        'time'=>'15 Sep 2026 • 16:30',
                        'icon'=>'▣',
                        'color'=>'bg-blue-100 text-blue-600',
                        'read'=>false
                    ],
                    [
                        'title'=>'Isi Survei Kepuasan',
                        'desc'=>'Silakan luangkan waktu sejenak untuk mengisi survei kepuasan kegiatan "Workshop Pengelolaan Data Riset Astronomi" guna penerbitan sertifikat.',
                        'time'=>'14 Sep 2026 • 10:15',
                        'icon'=>'□',
                        'color'=>'bg-yellow-100 text-yellow-600',
                        'read'=>true
                    ],
                    [
                        'title'=>'Sertifikat E-Sertifikat Tersedia',
                        'desc'=>'Sertifikat kehadiran Anda untuk "Konferensi Nasional Inovasi Pangan Lokal" sudah diterbitkan. Silakan unduh melalui halaman profil Anda.',
                        'time'=>'13 Sep 2026 • 09:20',
                        'icon'=>'♙',
                        'color'=>'bg-purple-100 text-purple-600',
                        'read'=>true
                    ],
                    [
                        'title'=>'Perubahan Lokasi Event',
                        'desc'=>'Pemberitahuan perubahan ruangan untuk "Webinar Teknologi Akselerator Partikel". Tautan ruang pertemuan Zoom telah diperbarui.',
                        'time'=>'11 Sep 2026 • 13:45',
                        'icon'=>'i',
                        'color'=>'bg-red-100 text-red-600',
                        'read'=>true
                    ],
                    [
                        'title'=>'Pendaftaran Berhasil',
                        'desc'=>'Anda telah terdaftar sebagai peserta "Workshop Pengelolaan Data Riset Astronomi" pada tanggal 18 Jan 2025.',
                        'time'=>'09 Sep 2026 • 11:00',
                        'icon'=>'✓',
                        'color'=>'bg-emerald-100 text-emerald-600',
                        'read'=>true
                    ],
                    [
                        'title'=>'Event Baru Deputi Kebijakan Riset',
                        'desc'=>'Kegiatan baru telah diterbitkan: "Simposium Nasional Penerapan Teknologi IoT" sedang membuka pendaftaran peserta gratis.',
                        'time'=>'08 Sep 2026 • 08:30',
                        'icon'=>'▣',
                        'color'=>'bg-blue-100 text-blue-600',
                        'read'=>true
                    ]
                ];

                $unreadCount=collect($notifications)->where('read',false)->count();
                $readCount=collect($notifications)->where('read',true)->count();
            @endphp

            {{-- filter --}}
            <div class="mb-3 border-b border-slate-200 pb-3 sm:mb-4 sm:flex sm:items-center sm:justify-between sm:pb-4">

                <!-- MOBILE DROPDOWN -->
                <div class="sm:hidden">
                    <select
                        id="mobileNotificationFilter"
                        class="h-9 w-full cursor-pointer rounded-xl border border-slate-200 bg-white px-3 text-[10px]! font-medium text-slate-700 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                        <option value="all">
                            Semua ({{ count($notifications) }})
                        </option>

                        <option value="unread">
                            Belum Dibaca ({{ $unreadCount }})
                        </option>

                        <option value="read">
                            Sudah Dibaca ({{ $readCount }})
                        </option>
                    </select>
                </div>

                <!-- DESKTOP FILTER -->
                <div class="hidden overflow-hidden rounded-xl border border-slate-200 bg-slate-50 p-1 sm:inline-flex sm:w-auto sm:rounded-full">

                    <button
                        type="button"
                        data-filter="all"
                        class="notification-filter flex min-w-0 items-center justify-center gap-1 rounded-full! bg-blue-600 px-2 py-1.5 text-[9px]! font-semibold text-white transition sm:rounded-full! sm:px-4! sm:py-2 sm:text-xs!"
                    >
                        <span class="truncate">Semua</span>

                        <span class="rounded-full! bg-white/20 px-1.5 text-[8px]! sm:text-[10px]!">
                            {{ count($notifications) }}
                        </span>
                    </button>

                    <button
                        type="button"
                        data-filter="unread"
                        class="notification-filter flex min-w-0 items-center justify-center gap-1 rounded-full! px-2 py-1.5 text-[9px]! font-medium! text-slate-600 transition hover:bg-white hover:text-blue-600 sm:rounded-full! sm:px-4 sm:py-2 sm:text-xs!"
                    >
                        <span class="truncate">Belum Dibaca</span>

                        <span class="rounded-full bg-slate-200 px-1.5 text-[8px]! text-slate-600 sm:text-[10px]!">
                            {{ $unreadCount }}
                        </span>
                    </button>

                    <button
                        type="button"
                        data-filter="read"
                        class="notification-filter flex min-w-0 items-center justify-center gap-1 rounded-full! px-2 py-1.5 text-[9px]! font-medium! text-slate-600 transition hover:bg-white hover:text-blue-600 sm:rounded-full sm:px-4 sm:py-2 sm:text-xs!"
                    >
                        <span class="truncate">Sudah Dibaca</span>

                        <span class="rounded-full bg-slate-200 px-1.5 text-[8px]! text-slate-600 sm:text-[10px]!">
                            {{ $readCount }}
                        </span>
                    </button>

                </div>

                <div class="mt-2 flex justify-end sm:mt-0">
                    <button
                        type="button"
                        id="markAllRead"
                        class="text-[9px]! font-medium! text-slate-500 transition hover:text-blue-600 sm:text-xs!"
                    >
                        Tandai Semua Dibaca
                    </button>
                </div>

            </div>

            {{-- notification list --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white sm:rounded-2xl">

                @foreach($notifications as $item)
                    <div
                        data-notification
                        data-status="{{ $item['read'] ? 'read' : 'unread' }}"
                        class="notification-item group relative flex gap-2.5 border-b border-slate-100 px-3 py-3 transition hover:bg-slate-50 last:border-none sm:gap-4 sm:px-5 sm:py-4"
                    >

                        <!-- UNREAD INDICATOR -->
                        @if(!$item['read'])
                            <span class="absolute left-0 top-0 h-full w-0.5 bg-blue-600"></span>
                        @endif

                        <!-- ICON -->
                        <div class="flex size-8 shrink-0 items-center justify-center rounded-full {{ $item['color'] }} text-[10px]! font-semibold sm:size-10 sm:text-sm!">
                            {{ $item['icon'] }}
                        </div>

                        <!-- CONTENT -->
                        <div class="min-w-0 flex-1">

                            <!-- TITLE + DATE TIME -->
                            <div class="flex min-w-0 items-start justify-between gap-2 sm:gap-4">

                                <h3 class="min-w-0 flex-1 truncate text-[11px]! text-slate-900 sm:text-[15px]! {{ $item['read'] ? 'font-medium' : 'font-bold' }}">
                                    {{ $item['title'] }}
                                </h3>

                                <span class="shrink-0 whitespace-nowrap pt-0.5 text-[8px]! text-slate-400 sm:text-[11px]!">
                                    {{ $item['time'] }}
                                </span>

                            </div>

                            <!-- DESCRIPTION -->
                            <p class="mt-1 line-clamp-2 text-[9px]! leading-4 text-slate-500 sm:mt-1.5 sm:text-[13px]! sm:leading-5 {{ $item['read'] ? 'font-normal' : 'font-medium text-slate-600' }}">
                                {{ $item['desc'] }}
                            </p>

                        </div>

                        <!-- DESKTOP MENU -->
                        <button
                            type="button"
                            class="hidden shrink-0 self-center text-lg! text-slate-300 transition hover:text-slate-600 sm:block"
                        >
                            ⋮
                        </button>

                    </div>
                @endforeach

                <!-- EMPTY STATE -->
                <div id="notificationEmpty" class="hidden px-4 py-12 text-center">
                    <p class="text-sm! font-semibold text-slate-700">
                        Tidak ada notifikasi
                    </p>

                    <p class="mt-1 text-xs! text-slate-400">
                        Belum ada notifikasi pada kategori ini.
                    </p>
                </div>

            </div>

        </div>
    </section>
@endsection