@extends('user.layouts.main')

@section('content')
<section class="min-h-screen bg-slate-50 pt-29 pb-12">
    <div class="mx-auto w-11/12 max-w-7xl">
        <div class="mb-2 text-center border-b border-slate-200">
            <h1 class="text-2xl text-shadow font-bold text-slate-900 sm:text-3xl">
                Profil Pengguna
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola informasi profil dan pantau aktivitas event Anda
            </p>
        </div>
        {{-- side kontent --}}
        <div class="flex flex-col items-start gap-6 lg:flex-row">
            <aside class="w-full rounded-2xl! border border-slate-200 bg-white p-6 shadow-sm lg:w-80">
                <div class="flex flex-col items-center">
                    <div class="flex h-28 w-28 items-center justify-center rounded-full bg-slate-200 text-3xl font-bold text-slate-500">AF</div>
                    <h2 class="mt-2 text-lg! font-bold text-slate-900">Dr. Ahmad Fauzi</h2>
                </div>

                <div class="my-1 border-t border-slate-200"></div>

                <div class="space-y-4 text-sm">
                    <div>
                        <p class="text-xs font-semibold text-slate-400">AFILIASI</p>
                        <p class="font-medium text-slate-900">BRIN - Pusat Riset Lingkungan</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400">EMAIL</p>
                        <p class="text-slate-700">ahmad.fauzi@brin.go.id</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400">TELEPON</p>
                        <p class="text-slate-700">+62 812-9876-5432</p>
                    </div>
                </div>

                <button class="mt-6 w-full rounded-3xl! border border-blue-500 py-2 text-sm! font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">
                    Edit Profil
                </button>
            </aside>

            <div class="flex-1 space-y-6">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div class="group rounded-xl border border-slate-200 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-lg text-blue-600 transition group-hover:bg-white">
                                📅
                            </div>
                            <div>
                                <p class="text-xl font-bold text-slate-900 transition group-hover:text-white">
                                    12
                                </p>
                                <p class="text-sm font-medium text-slate-600 transition group-hover:text-blue-100">
                                    Event Diikuti
                                </p>
                                <p class="mt-1 text-xs text-slate-400 transition group-hover:text-blue-100">
                                    Total partisipasi kegiatan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="group rounded-xl border border-slate-200 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-lg text-blue-600 transition group-hover:bg-white">
                                📝
                            </div>
                            <div>
                                <p class="text-xl font-bold text-slate-900 transition group-hover:text-white">
                                    10
                                </p>
                                <p class="text-sm font-medium text-slate-600 transition group-hover:text-blue-100">
                                    Survei Selesai
                                </p>
                                <p class="mt-1 text-xs text-slate-400 transition group-hover:text-blue-100">
                                    Feedback telah diberikan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="group rounded-xl border border-slate-200 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-lg text-blue-600 transition group-hover:bg-white">
                                ⭐
                            </div>
                            <div>
                                <p class="text-xl font-bold text-slate-900 transition group-hover:text-white">
                                    8
                                </p>
                                <p class="text-sm font-medium text-slate-600 transition group-hover:text-blue-100">
                                    Feedback Diberikan
                                </p>
                                <p class="mt-1 text-xs text-slate-400 transition group-hover:text-blue-100">
                                    Kontribusi untuk event
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Riwayat event Terbaru --}}
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <div class="rounded-xl border mb-2 border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:shadow-lg">
                        <h2 class="mb-4 text-lg! font-bold text-slate-900">
                            Riwayat Event Terbaru
                        </h2>
                        <div class="border-b border-slate-100"></div>

                        <div class="divide-y divide-slate-200">
                            @foreach([
                            ['name'=>'Seminar Analisis Kebijakan Lingkungan BRIN','date'=>'15 Jan 2025','role'=>'Peserta'],
                            ['name'=>'Workshop Pengelolaan Data Riset Astronomi','date'=>'10 Des 2024','role'=>'Peserta'],
                            ['name'=>'Simposium Nasional Kebijakan Energi Terbarukan','date'=>'24 Nov 2024','role'=>'Pembicara']
                            ] as $event)

                            <div class="group flex cursor-pointer flex-col gap-3 rounded-lg py-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:px-3 hover:shadow-lg sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <h3 class="truncate text-sm! font-semibold text-slate-900 transition duration-300 group-hover:text-white">
                                        {{ $event['name'] }}
                                    </h3>

                                    <p class="mt-1 text-xs! text-slate-500 transition duration-300 group-hover:text-blue-100">
                                        {{ $event['date'] }} • Peran: {{ $event['role'] }}
                                    </p>
                                </div>

                                <span class="w-fit shrink-0 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600 transition duration-300 group-hover:bg-white group-hover:text-blue-600">
                                    Hadir
                                </span>
                            </div>

                            @endforeach
                        </div>
                    </div>

                {{-- aktivitas Terbaru --}}
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <h2 class="mb-4 text-lg! font-bold text-slate-900">
                        Aktivitas Terbaru
                    </h2>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="group cursor-pointer rounded-lg border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:shadow-lg">
                            <div class="flex items-start gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm text-blue-600 transition group-hover:bg-white">
                                    📝
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-900 transition group-hover:text-white">
                                        Mengisi Survey Event
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500 transition group-hover:text-blue-100">
                                        BRIN Environment Policy Analysis Talk
                                    </p>

                                    <span class="mt-2 inline-block rounded-full bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-600 transition group-hover:bg-white group-hover:text-blue-600">
                                        Selesai
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="group cursor-pointer rounded-lg border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:shadow-lg">
                            <div class="flex items-start gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm text-blue-600 transition group-hover:bg-white">
                                    📅
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-slate-900 transition group-hover:text-white">
                                        Mengikuti Event Baru
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500 transition group-hover:text-blue-100">
                                        Green Technology Research Forum
                                    </p>

                                    <span class="mt-2 inline-block rounded-full bg-blue-50 px-2 py-1 text-xs font-medium text-blue-600 transition group-hover:bg-white group-hover:text-blue-600">
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
</section>
@endsection


