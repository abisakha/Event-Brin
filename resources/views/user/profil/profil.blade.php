@extends('user.layouts.main')

@section('content')
<section class="min-h-screen bg-slate-50 pb-12 pt-24 sm:pt-29">
    <div class="mx-auto w-11/12 max-w-7xl">

        {{-- header --}}
        <div class="mb-4 border-b border-slate-200 pb-3 text-center sm:mb-2 sm:pb-0">
            <h1 class="text-shadow text-xl font-bold text-slate-900 sm:text-3xl">
                Profil Pengguna
            </h1>

            <p class="mt-1 text-[10px] text-slate-500 sm:text-sm">
                Kelola informasi profil dan pantau aktivitas event Anda
            </p>
        </div>

        {{-- side kontent --}}
        <div class="flex flex-col items-start gap-4 sm:gap-6 lg:flex-row">

            {{-- profile sidebar --}}
            <aside class="w-full rounded-2xl! border border-slate-200 bg-white p-4 shadow-sm sm:p-6 lg:w-80">

                <div class="flex items-center gap-3 sm:flex-col sm:gap-0">

                    <div class="flex size-16 shrink-0 items-center justify-center rounded-full bg-slate-200 text-lg font-bold text-slate-500 sm:h-28 sm:w-28 sm:text-3xl">
                        {{ strtoupper(substr($user->name,0,2)) }}
                    </div>

                    <div class="min-w-0 sm:w-full sm:text-center">

                        <h2 class="truncate text-base! font-bold text-slate-900 sm:mt-2 sm:text-lg!">
                            {{ $user->name }}
                        </h2>

                        <p class="mt-0.5 truncate text-[10px] text-slate-500 sm:hidden">
                            {{ $user->satker_name ?? '-' }}
                        </p>

                    </div>
                </div>

                <div class="my-3 border-t border-slate-200 sm:my-1"></div>

                <div class="grid grid-cols-2 gap-3 text-[10px] sm:block sm:space-y-4 sm:text-sm">

                    <div class="min-w-0">
                        <p class="truncate text-[9px] font-semibold text-slate-400 sm:text-xs">
                            AFILIASI
                        </p>

                        <p class="truncate font-medium text-slate-900">
                            {{ $user->satker_name ?? '-' }}
                        </p>
                    </div>

                    <div class="min-w-0">
                        <p class="truncate text-[9px] font-semibold text-slate-400 sm:text-xs">
                            EMAIL
                        </p>

                        <p class="truncate text-slate-700">
                            {{ $user->email ?? '-' }}
                        </p>
                    </div>

                </div>
            </aside>

            {{-- main content --}}
            <div class="w-full min-w-0 flex-1 space-y-4 sm:space-y-6">

                {{-- summary --}}
                <div class="grid grid-cols-3 gap-2 sm:gap-3">

                    <!-- CARD 1 -->
                    <div class="group min-w-0 overflow-hidden rounded-xl border border-slate-200 bg-white p-2.5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg sm:p-4">
                        <div class="flex min-w-0 flex-col items-center gap-1.5 text-center sm:flex-row sm:items-center sm:gap-3 sm:text-left">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm text-blue-600 transition group-hover:bg-white sm:h-10 sm:w-10 sm:text-lg">
                                📅
                            </div>

                            <div class="min-w-0 w-full">
                                <p class="truncate text-base font-bold text-slate-900 transition group-hover:text-white sm:text-xl">
                                    12
                                </p>

                                <p class="truncate text-[9px] font-medium text-slate-600 transition group-hover:text-blue-100 sm:text-sm">
                                    Event Diikuti
                                </p>

                                <p class="mt-1 hidden truncate text-xs text-slate-400 transition group-hover:text-blue-100 sm:block">
                                    Total partisipasi kegiatan
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div class="group min-w-0 overflow-hidden rounded-xl border border-slate-200 bg-white p-2.5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg sm:p-4">
                        <div class="flex min-w-0 flex-col items-center gap-1.5 text-center sm:flex-row sm:items-center sm:gap-3 sm:text-left">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm text-blue-600 transition group-hover:bg-white sm:h-10 sm:w-10 sm:text-lg">
                                📝
                            </div>

                            <div class="min-w-0 w-full">
                                <p class="truncate text-base font-bold text-slate-900 transition group-hover:text-white sm:text-xl">
                                    10
                                </p>

                                <p class="truncate text-[9px] font-medium text-slate-600 transition group-hover:text-blue-100 sm:text-sm">
                                    Survei Selesai
                                </p>

                                <p class="mt-1 hidden truncate text-xs text-slate-400 transition group-hover:text-blue-100 sm:block">
                                    Feedback telah diberikan
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- CARD 3 -->
                    <div class="group min-w-0 overflow-hidden rounded-xl border border-slate-200 bg-white p-2.5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg sm:p-4">
                        <div class="flex min-w-0 flex-col items-center gap-1.5 text-center sm:flex-row sm:items-center sm:gap-3 sm:text-left">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm text-blue-600 transition group-hover:bg-white sm:h-10 sm:w-10 sm:text-lg">
                                ⭐
                            </div>

                            <div class="min-w-0 w-full">
                                <p class="truncate text-base font-bold text-slate-900 transition group-hover:text-white sm:text-xl">
                                    8
                                </p>

                                <p class="truncate text-[9px] font-medium text-slate-600 transition group-hover:text-blue-100 sm:text-sm">
                                    Feedback Diberikan
                                </p>

                                <p class="mt-1 hidden truncate text-xs text-slate-400 transition group-hover:text-blue-100 sm:block">
                                    Kontribusi untuk event
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- riwayat event terbaru --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3 sm:p-5">

                    <div class="mb-2 rounded-xl border border-slate-200 bg-white p-3 shadow-sm transition duration-300 hover:shadow-lg sm:p-5">

                        <h2 class="mb-3 truncate text-base! font-bold text-slate-900 sm:mb-4 sm:text-lg!">
                            Riwayat Event Terbaru
                        </h2>

                        <div class="border-b border-slate-100"></div>

                        <div class="divide-y divide-slate-200">

                            @foreach([
                                ['name'=>'Seminar Analisis Kebijakan Lingkungan BRIN','date'=>'15 Jan 2025','role'=>'Peserta'],
                                ['name'=>'Workshop Pengelolaan Data Riset Astronomi','date'=>'10 Des 2024','role'=>'Peserta'],
                                ['name'=>'Simposium Nasional Kebijakan Energi Terbarukan','date'=>'24 Nov 2024','role'=>'Pembicara']
                            ] as $event)

                                <div class="group flex min-w-0 cursor-pointer items-center justify-between gap-3 rounded-lg py-3 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:px-3 hover:shadow-lg sm:py-4">

                                    <div class="min-w-0 flex-1">
                                        <h3
                                            title="{{ $event['name'] }}"
                                            class="w-full truncate text-[11px]! font-semibold text-slate-900 transition duration-300 group-hover:text-white sm:text-sm!"
                                        >
                                            {{ $event['name'] }}
                                        </h3>

                                        <p class="mt-1 w-full truncate text-[9px]! text-slate-500 transition duration-300 group-hover:text-blue-100 sm:text-xs!">
                                            {{ $event['date'] }} • Peran: {{ $event['role'] }}
                                        </p>
                                    </div>

                                    <span class="w-fit shrink-0 rounded-full bg-emerald-50 px-2 py-1 text-[9px] font-semibold text-emerald-600 transition duration-300 group-hover:bg-white group-hover:text-blue-600 sm:px-3 sm:text-xs">
                                        Hadir
                                    </span>

                                </div>

                            @endforeach

                        </div>
                    </div>

                    {{-- altivitas terbaru --}}
                    <div class="rounded-xl border border-slate-200 bg-white p-3 sm:p-5">

                        <h2 class="mb-3 truncate text-base! font-bold text-slate-900 sm:mb-4 sm:text-lg!">
                            Aktivitas Terbaru
                        </h2>

                        <div class="grid grid-cols-2 gap-2 sm:grid-cols-2 sm:gap-3">

                            <!-- CARD AKTIVITAS 1 -->
                            <div class="group min-w-0 cursor-pointer overflow-hidden rounded-lg border border-slate-200 bg-slate-50 p-2.5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:shadow-lg sm:p-4">
                                <div class="flex min-w-0 items-start gap-2 sm:gap-3">

                                    <div class="flex size-7 shrink-0 items-center justify-center rounded-full bg-blue-50 text-[10px] text-blue-600 transition group-hover:bg-white sm:h-9 sm:w-9 sm:text-sm">
                                        📝
                                    </div>

                                    <div class="min-w-0 flex-1">

                                        <p
                                            title="Mengisi Survey Event"
                                            class="w-full truncate text-[10px] font-semibold text-slate-900 transition group-hover:text-white sm:text-sm"
                                        >
                                            Mengisi Survey Event
                                        </p>

                                        <p
                                            title="BRIN Environment Policy Analysis Talk"
                                            class="mt-1 w-full truncate text-[9px] leading-4 text-slate-500 transition group-hover:text-blue-100 sm:text-xs"
                                        >
                                            BRIN Environment Policy Analysis Talk
                                        </p>

                                        <span class="mt-2 inline-block max-w-full truncate rounded-full bg-emerald-50 px-2 py-1 text-[8px] font-medium text-emerald-600 transition group-hover:bg-white group-hover:text-blue-600 sm:text-xs">
                                            Selesai
                                        </span>

                                    </div>

                                </div>
                            </div>

                            <!-- CARD AKTIVITAS 2 -->
                            <div class="group min-w-0 cursor-pointer overflow-hidden rounded-lg border border-slate-200 bg-slate-50 p-2.5 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:shadow-lg sm:p-4">
                                <div class="flex min-w-0 items-start gap-2 sm:gap-3">

                                    <div class="flex size-7 shrink-0 items-center justify-center rounded-full bg-blue-50 text-[10px] text-blue-600 transition group-hover:bg-white sm:h-9 sm:w-9 sm:text-sm">
                                        📅
                                    </div>

                                    <div class="min-w-0 flex-1">

                                        <p
                                            title="Mengikuti Event Baru"
                                            class="w-full truncate text-[10px] font-semibold text-slate-900 transition group-hover:text-white sm:text-sm"
                                        >
                                            Mengikuti Event Baru
                                        </p>

                                        <p
                                            title="Green Technology Research Forum"
                                            class="mt-1 w-full truncate text-[9px] leading-4 text-slate-500 transition group-hover:text-blue-100 sm:text-xs"
                                        >
                                            Green Technology Research Forum
                                        </p>

                                        <span class="mt-2 inline-block max-w-full truncate rounded-full bg-blue-50 px-2 py-1 text-[8px] font-medium text-blue-600 transition group-hover:bg-white group-hover:text-blue-600 sm:text-xs">
                                            Terdaftar
                                        </span>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
