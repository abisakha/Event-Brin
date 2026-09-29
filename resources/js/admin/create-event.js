const eventImage = document.getElementById('event_image');
const eventImageEmpty = document.getElementById('eventImageEmpty');
const eventImagePreview = document.getElementById('eventImagePreview');
const eventImagePreviewImage = document.getElementById('eventImagePreviewImage');
const eventImageName = document.getElementById('eventImageName');
const eventImageSize = document.getElementById('eventImageSize');
const removeEventImage = document.getElementById('removeEventImage');
const eventImageError = document.getElementById('eventImageError');

eventImage.addEventListener('change', function () {
    const file = this.files[0];

    if (!file) {
        return;
    }

    const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    const maxSize = 5 * 1024 * 1024;

    if (!allowedTypes.includes(file.type)) {
        eventImageError.textContent = 'File harus JPG, PNG, atau WEBP.';
        eventImageError.classList.remove('hidden');
        this.value = '';
        return;
    }

    if (file.size > maxSize) {
        eventImageError.textContent = 'Ukuran gambar maksimal 5 MB.';
        eventImageError.classList.remove('hidden');
        this.value = '';
        return;
    }

    eventImageError.classList.add('hidden');

    const imageUrl = URL.createObjectURL(file);

    eventImagePreviewImage.src = imageUrl;
    eventImageName.textContent = file.name;
    eventImageSize.textContent = `${(file.size / 1024 / 1024).toFixed(2)} MB`;

    eventImageEmpty.classList.add('hidden');
    eventImagePreview.classList.remove('hidden');
});

removeEventImage.addEventListener('click', function () {
    eventImage.value = '';
    eventImagePreviewImage.src = '';
    eventImageName.textContent = '';
    eventImageSize.textContent = '';

    eventImagePreview.classList.add('hidden');
    eventImageEmpty.classList.remove('hidden');
});
