@extends('user.layouts.main')

@section('title', 'Kalender Event')

@section('content')

<section class="min-h-screen bg-slate-50 pb-16 pt-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">

        <!-- ================= HEADER ================= -->
        <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl text-shadow font-extrabold text-slate-900 md:text-3xl">Kalender Event</h1>
                <p class="mt-1 text-sm text-slate-500">Lihat seluruh jadwal event dan agenda yang telah Anda registrasi.</p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                <!-- CATEGORY - UI DUMMY -->
                <select class="h-10 cursor-pointer rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-700 shadow-sm outline-none transition hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    <option>Semua Event</option>
                    <option>Sudah Diregistrasi</option>
                </select>

                <!-- MONTH NAVIGATION -->
                <div class="flex h-10 items-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                    <button type="button" id="prevMonth" class="flex h-full w-10 items-center justify-center text-lg text-slate-600 transition hover:bg-blue-600 hover:text-white">‹</button>

                    <div id="headerMonth" class="min-w-36 px-4 text-center text-sm font-bold text-slate-900">Januari 2025</div>

                    <button type="button" id="nextMonth" class="flex h-full w-10 items-center justify-center text-lg text-slate-600 transition hover:bg-blue-600 hover:text-white">›</button>
                </div>

            </div>
        </div>

        <!-- ================= CONTENT ================= -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <!-- ================= CALENDAR ================= -->
            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-8">

                <div class="flex items-center justify-center border-b border-slate-100 px-5 py-4">
                    <h2 id="calendarMonth" class="text-base font-bold text-slate-900">Januari 2025</h2>
                </div>

                <!-- DAY NAMES -->
                <div class="grid grid-cols-7 border-b border-slate-100 px-2 py-3 sm:px-5">
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Senin</span><span class="sm:hidden">Sen</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Selasa</span><span class="sm:hidden">Sel</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Rabu</span><span class="sm:hidden">Rab</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Kamis</span><span class="sm:hidden">Kam</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Jumat</span><span class="sm:hidden">Jum</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Sabtu</span><span class="sm:hidden">Sab</span></div>
                    <div class="text-center text-xs font-semibold text-slate-400"><span class="hidden sm:inline">Minggu</span><span class="sm:hidden">Min</span></div>
                </div>

                <!-- GENERATED CALENDAR -->
                <div id="calendarDays" class="grid grid-cols-7 gap-1 p-2 sm:gap-2 sm:p-5"></div>

                <!-- LEGEND -->
                <div class="flex flex-wrap items-center gap-4 border-t border-slate-100 px-5 py-4">
                    <div class="flex items-center gap-2">
                        <span class="size-2.5 rounded-full bg-blue-600"></span>
                        <span class="text-xs text-slate-500">Ada event</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="size-2.5 rounded-full border-2 border-blue-600 bg-white"></span>
                        <span class="text-xs text-slate-500">Tanggal terpilih</span>
                    </div>
                </div>

            </div>

            <!-- ================= AGENDA ================= -->
            <aside class="lg:col-span-4">
                <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-sm lg:sticky lg:top-24">

                    <!-- AGENDA HEADER -->
                    <div class="mb-3 border-b border-slate-100 pb-4">
                        <span class="text-xs font-bold  tracking-wide text-blue-600">Agenda Terpilih</span>
                        <h2 id="selectedDateTitle" class="text-shadow mt-1 text-2xl! font-extrabold text-slate-900 md:text-2xl">
                            Rabu, 15 Januari 2025
                        </h2>
                    </div>

                    <!-- AGENDA STATIC / BLADE -->
                    <div class="space-y-3">

                        <div class="group rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm">
                            <div class="mb-3 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <span class="w-fit rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-600">Seminar</span>
                                <span class="text-xs text-slate-500">09:00 - 16:00 WIB</span>
                            </div>

                            <h3 class="text-lg! font-bold leading-5 text-slate-900">Seminar Analisis Kebijakan Lingkungan BRIN</h3>

                            <div class="mt-2 flex items-start gap-2">
                                <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-3.5 object-contain" alt="Location">
                                <p class="m-0 text-xs leading-5 text-slate-500">Auditorium Utama BRIN, Jakarta Selatan</p>
                            </div>
                        </div>

                        <div class="group rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm">
                            <div class="mb-3 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <span class="w-fit rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-600">Pertemuan Inti</span>
                                <span class="text-xs text-slate-500">14:00 - 15:30 WIB</span>
                            </div>

                            <h3 class="text-lg! font-bold leading-5 text-slate-900">Sesi Diskusi Internal Riset Sosial</h3>

                            <div class="mt-2 flex items-start gap-2">
                                <img src="{{ asset('assets/images/location.png') }}" class="mt-0.5 size-3.5 object-contain" alt="Location">
                                <p class="m-0 text-xs leading-5 text-slate-500">R. Rapat Pleno Deputi II, Jakarta</p>
                            </div>
                        </div>

                    </div>

                </div>
            </aside>

        </div>
    </div>
</section>

<!-- ================= CALENDAR JS ================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentDate = new Date(2025, 0, 1);
    let selectedDay = 15;

    // DUMMY - nanti diganti data dari Laravel
    const eventDates = [
        '2025-01-03',
        '2025-01-08',
        '2025-01-15',
        '2025-01-21',
        '2025-01-27',
        '2025-02-05',
        '2025-02-12',
        '2025-02-20'
    ];

    const monthNames = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    const calendarDays = document.getElementById('calendarDays');
    const calendarMonth = document.getElementById('calendarMonth');
    const headerMonth = document.getElementById('headerMonth');
    const selectedDateTitle = document.getElementById('selectedDateTitle');

    function getDateKey(year, month, day) {
        return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    function updateSelectedTitle() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const selectedDate = new Date(year, month, selectedDay);

        selectedDateTitle.textContent = `${dayNames[selectedDate.getDay()]}, ${selectedDay} ${monthNames[month]} ${year}`;
    }

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const totalDays = new Date(year, month + 1, 0).getDate();

        let firstDay = new Date(year, month, 1).getDay();
        firstDay = firstDay === 0 ? 6 : firstDay - 1;

        calendarMonth.textContent = `${monthNames[month]} ${year}`;
        headerMonth.textContent = `${monthNames[month]} ${year}`;

        let html = '';
        const previousMonthLastDay = new Date(year, month, 0).getDate();

        // PREVIOUS MONTH
        for (let i = firstDay - 1; i >= 0; i--) {
            html += `
                <div class="flex min-h-12 items-center justify-center rounded-xl border border-slate-100 bg-slate-50 text-xs text-slate-300 sm:min-h-20">
                    ${previousMonthLastDay - i}
                </div>
            `;
        }

        // CURRENT MONTH
        for (let day = 1; day <= totalDays; day++) {
            const key = getDateKey(year, month, day);
            const hasEvent = eventDates.includes(key);
            const isSelected = selectedDay === day;

            let style = 'border-slate-200 bg-white text-slate-700 hover:border-blue-400 hover:bg-blue-50';

            if (hasEvent) {
                style = 'border-blue-600 bg-blue-600 text-white shadow-sm hover:bg-blue-700';
            }

            if (isSelected) {
                style = hasEvent
                    ? 'border-blue-700 bg-blue-600 text-white ring-2 ring-blue-200 shadow-sm'
                    : 'border-blue-600 bg-white text-blue-600 ring-2 ring-blue-100';
            }

            html += `
                <button type="button" data-day="${day}" class="relative flex min-h-12 items-center justify-center rounded-xl border text-xs font-semibold transition duration-200 hover:-translate-y-0.5 hover:shadow-sm sm:min-h-20 sm:text-sm ${style}">
                    ${day}

                    ${hasEvent ? `
                        <span class="absolute bottom-1.5 size-1.5 rounded-full bg-white/80 sm:bottom-2"></span>
                    ` : ''}
                </button>
            `;
        }

        // NEXT MONTH
        const totalCells = firstDay + totalDays;
        const remaining = totalCells % 7 === 0 ? 0 : 7 - (totalCells % 7);

        for (let day = 1; day <= remaining; day++) {
            html += `
                <div class="flex min-h-12 items-center justify-center rounded-xl border border-slate-100 bg-slate-50 text-xs text-slate-300 sm:min-h-20">
                    ${day}
                </div>
            `;
        }

        calendarDays.innerHTML = html;

        calendarDays.querySelectorAll('[data-day]').forEach(button => {
            button.addEventListener('click', function () {
                selectedDay = Number(this.dataset.day);
                renderCalendar();
                updateSelectedTitle();
            });
        });

        updateSelectedTitle();
    }

    document.getElementById('prevMonth').addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        selectedDay = 1;
        renderCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        selectedDay = 1;
        renderCalendar();
    });

    renderCalendar();
});
</script>

@endsection
