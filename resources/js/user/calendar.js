let date = new Date(2025, 4, 1);
let selectedDay = null;

let events = {
    "2025-05-09": {
        title: "BRIN Environment Policy Analysis Talk",
        location: "Jakarta, Indonesia",
        time: "09:00 - 12:00"
    },
    "2025-05-14": {
        title: "BRIN Research Innovation Seminar",
        location: "Jakarta, Indonesia",
        time: "10:00 - 12:00"
    },
    "2025-05-20": {
        title: "National Research Conference",
        location: "Jakarta, Indonesia",
        time: "09:00 - 12:00"
    },
    "2025-05-24": {
        title: "Research Collaboration Forum",
        location: "Bandung, Indonesia",
        time: "09:00 - 11:00"
    },
    "2025-05-27": {
        title: "Technology & Innovation Workshop",
        location: "Bogor, Indonesia",
        time: "13:00 - 16:00"
    }
};

function getDateKey(year, month, day) {
    return `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
}

function renderCalendar() {
    let year = date.getFullYear();
    let month = date.getMonth();
    let monthName = date.toLocaleString("en-US", { month: "long" });
    let firstDay = new Date(year, month, 1).getDay();
    let totalDays = new Date(year, month + 1, 0).getDate();

    document.getElementById("monthYear").innerHTML = `${monthName} ${year}`;

    let html = "";

    for (let i = 0; i < firstDay; i++) {
        html += `<span></span>`;
    }

    for (let day = 1; day <= totalDays; day++) {
        let key = getDateKey(year, month, day);
        let hasEvent = Boolean(events[key]);
        let isSelected = selectedDay === day;

        let state = hasEvent
            ? "bg-blue-600! text-white! font-semibold shadow-sm hover:bg-blue-700!"
            : "bg-transparent! text-slate-700! hover:bg-blue-600! hover:text-white!";

        let selected = isSelected && !hasEvent
            ? "ring-2 ring-blue-200"
            : "";

        html += `
            <button
                onclick="selectDate(${day})"
                class="mx-auto flex size-8 cursor-pointer items-center justify-center rounded-full! border-0! text-sm transition-all duration-200 hover:scale-110 hover:shadow-md sm:size-9 ${state} ${selected}">
                ${day}
            </button>
        `;
    }

    document.getElementById("calendarDays").innerHTML = html;
}

function selectDate(day) {
    selectedDay = day;

    let key = getDateKey(date.getFullYear(), date.getMonth(), day);
    let event = events[key];

    renderCalendar();

    if (event) {
        document.getElementById("eventInfo").innerHTML = `
            <h5 class="mb-2 text-sm font-semibold text-slate-900">${event.title}</h5>
            <p class="mb-1 text-xs text-slate-600">📍 ${event.location}</p>
            <p class="m-0 text-xs text-slate-600">🕒 ${event.time}</p>
        `;
    } else {
        document.getElementById("eventInfo").innerHTML = `
            <h5 class="mb-1 text-sm font-semibold text-slate-900">No Event</h5>
            <p class="m-0 text-xs text-slate-500">There are no events scheduled on this date.</p>
        `;
    }
}

function nextMonth() {
    date.setMonth(date.getMonth() + 1);
    selectedDay = null;
    renderCalendar();
}

function prevMonth() {
    date.setMonth(date.getMonth() - 1);
    selectedDay = null;
    renderCalendar();
}

window.nextMonth = nextMonth;
window.prevMonth = prevMonth;
window.selectDate = selectDate;

renderCalendar();
