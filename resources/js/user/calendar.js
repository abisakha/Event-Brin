

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
