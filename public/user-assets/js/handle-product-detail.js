document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.getElementById('descWrapper');
    const btn = document.getElementById('btnToggleDesc');
    const gradient = document.getElementById('descGradient');
    if (wrapper.scrollHeight <= 500) {
        btn.style.display = 'none';
        gradient.style.display = 'none';
    }
    btn.addEventListener('click', function () {
        const isExpanded = wrapper.classList.contains('expanded');
        if (isExpanded) {
            // Đang mở -> Thu gọn lại
            wrapper.classList.remove('expanded');
            wrapper.style.maxHeight = "400px";
            btn.innerHTML = 'Đọc tiếp bài viết <i class="bi bi-chevron-down ms-1"></i>';
            // Cuộn mượt lên đầu phần mô tả
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } else {
            // Đang đóng -> Mở rộng ra
            wrapper.classList.add('expanded');
            wrapper.style.maxHeight = wrapper.scrollHeight + "px";
            btn.innerHTML = 'Thu gọn bài viết <i class="bi bi-chevron-up ms-1"></i>';
        }
    });
});
// Animation cho danh sách ảnh
let currentIndex = 0;
const thumbs = document.querySelectorAll('.thumb-img');
const mainImage = document.getElementById('mainImage');

function changeImage(element, index) {
    currentIndex = index;
    mainImage.src = element.src;
    thumbs.forEach(img => img.classList.remove('border-danger'));
    element.classList.add('border-danger');
}

function nextImage() {
    currentIndex++;
    if (currentIndex >= thumbs.length) {
        currentIndex = 0; // Quay lại ảnh đầu tiên
    }
    updateSlider();
}

function prevImage() {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = thumbs.length - 1; // Nhảy xuống ảnh cuối cùng
    }
    updateSlider();
}

function updateSlider() {
    const targetThumb = thumbs[currentIndex];
    const mainImg = document.getElementById('mainImage');
    mainImg.classList.add('changing');
    setTimeout(() => {
        mainImg.src = targetThumb.src;
        thumbs.forEach(img => img.classList.remove('border-danger'));
        targetThumb.classList.add('border-danger');
        targetThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        mainImg.classList.remove('changing');
    }, 300);
}