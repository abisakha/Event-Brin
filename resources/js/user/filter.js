
    document.addEventListener('DOMContentLoaded', function () {
        const filterForm = document.getElementById('filterForm');
        const applyFilter = document.getElementById('applyFilter');

        const button = document.getElementById('dateRangeButton');
        const panel = document.getElementById('dateRangePanel');
        const text = document.getElementById('dateRangeText');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        const applyDate = document.getElementById('applyDate');
        const clearDate = document.getElementById('clearDate');

        const sortFilter = document.getElementById('sortFilter');
        if (filterForm && applyFilter) {
            applyFilter.addEventListener('click', function (e) {
                e.preventDefault();

                // Mengambil semua input yang ada di dalam form
                const formData = new FormData(filterForm);

                // Menyiapkan query parameter untuk URL
                const params = new URLSearchParams();

                // Memasukkan hanya filter yang memiliki value
                formData.forEach((value, key) => {
                    if (value !== '') {
                        params.append(key, value);
                    }
                });

                // Debug sementara
                console.log([...formData.entries()]);

                // Membuat URL tujuan
                const queryString = params.toString();

                // Jika ada filter
                if (queryString) {
                    window.location.href = `${filterForm.action}?${queryString}`;
                } else {
                    window.location.href = filterForm.action;
                }
            });
        }
        if (sortFilter && filterForm) {
            sortFilter.addEventListener('change', function () {

                const formData = new FormData(filterForm);
                const params = new URLSearchParams();

                formData.forEach((value, key) => {
                    if (value !== '') {
                        params.append(key, value);
                    }
                });

                const queryString = params.toString();

                if (queryString) {
                    window.location.href = `${filterForm.action}?${queryString}`;
                } else {
                    window.location.href = filterForm.action;
                }
            });
        }

        if (button && panel) {

            // Membuka / menutup popup tanggal
            button.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                panel.classList.toggle('hidden');
            });


            // Supaya klik di dalam popup tidak menutup popup
            panel.addEventListener('click', function (e) {
                e.stopPropagation();
            });


            // Tombol pilih tanggal
            if (applyDate) {
                applyDate.addEventListener('click', function () {

                    // Validasi tanggal harus lengkap
                    if (!startDate.value || !endDate.value) {
                        alert('Pilih tanggal mulai dan tanggal selesai.');
                        return;
                    }

                    // Validasi tanggal selesai
                    if (endDate.value < startDate.value) {
                        alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
                        return;
                    }

                    // Menampilkan tanggal yang dipilih
                    text.textContent =
                        `${formatDate(startDate.value)} - ${formatDate(endDate.value)}`;

                    text.classList.add(
                        'font-medium',
                        'text-blue-600'
                    );

                    // Menutup popup
                    panel.classList.add('hidden');
                });
            }

            if (clearDate) {
                clearDate.addEventListener('click', function () {

                    startDate.value = '';
                    endDate.value = '';

                    text.textContent = 'Rentang Tanggal';

                    text.classList.remove(
                        'font-medium',
                        'text-blue-600'
                    );
                });
            }
            if (startDate.value && endDate.value) {

                text.textContent =
                    `${formatDate(startDate.value)} - ${formatDate(endDate.value)}`;

                text.classList.add(
                    'font-medium',
                    'text-blue-600'
                );
            }

            document.addEventListener('click', function () {
                panel.classList.add('hidden');
            });
        }

        function formatDate(value) {
            return new Date(`${value}T00:00:00`)
                .toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
        }
    });

