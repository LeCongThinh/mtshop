const avatarInput = document.getElementById('avatar');
const avatarPreview = document.getElementById('avatarPreview');

// Click vào ảnh → mở chọn file
avatarPreview.addEventListener('click', function () {
    avatarInput.click();
});

// Preview ảnh
avatarInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            avatarPreview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
