document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('dateRangeButton');
    const panel = document.getElementById('dateRangePanel');
    const text = document.getElementById('dateRangeText');
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    const applyDate = document.getElementById('applyDate');
    const clearDate = document.getElementById('clearDate');

    if (!button || !panel) return;

    button.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        panel.classList.toggle('hidden');
    });

    panel.addEventListener('click', function (e) {
        e.stopPropagation();
    });

    applyDate.addEventListener('click', function () {
        if (!startDate.value || !endDate.value) {
            alert('Pilih tanggal mulai dan tanggal selesai.');
            return;
        }

        if (endDate.value < startDate.value) {
            alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
            return;
        }

        text.textContent = `${formatDate(startDate.value)} - ${formatDate(endDate.value)}`;
        text.classList.add('font-medium', 'text-blue-600');
        panel.classList.add('hidden');
    });

    clearDate.addEventListener('click', function () {
        startDate.value = '';
        endDate.value = '';
        text.textContent = 'Pilih Rentang Tanggal';
        text.classList.remove('font-medium', 'text-blue-600');
    });

    document.addEventListener('click', function () {
        panel.classList.add('hidden');
    });

    function formatDate(value) {
        return new Date(`${value}T00:00:00`).toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });
    }
});
