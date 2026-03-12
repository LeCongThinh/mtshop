document.addEventListener("DOMContentLoaded", function () {

    // --- 1. XỬ LÝ PREVIEW THUMBNAIL (1 ẢNH) ---
    const thumbInput = document.getElementById('thumbInput');
    const thumbPreview = document.getElementById('thumbPreview');

    if (thumbPreview && thumbInput) {
        // Click vào ảnh đại diện thì kích hoạt input file
        thumbPreview.addEventListener('click', function () {
            thumbInput.click();
        });

        // Preview ảnh sau khi chọn
        thumbInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    thumbPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // --- 2. XỬ LÝ PREVIEW GALLERY (NHIỀU ẢNH) ---
    const galleryInput = document.getElementById('galleryInput');
    const galleryPreview = document.getElementById('galleryPreview');
    const emptyMessage = document.getElementById('emptyMessage');

    // Mảng lưu trữ tất cả file thực tế sẽ upload
    let allFiles = [];

    galleryInput.addEventListener('change', function (event) {
        const files = Array.from(event.target.files);

        files.forEach(file => {
            if (!file.type.startsWith('image/')) return;

            // Thêm file vào mảng quản lý
            allFiles.push(file);

            // Tạo ID duy nhất để dễ xóa
            const fileId = Date.now() + Math.random();
            file.uniqueId = fileId;

            // Tạo giao diện Preview
            renderPreview(file);
        });

        checkEmpty();
        // Reset input để có thể chọn lại cùng 1 file nếu đã xóa
        galleryInput.value = "";
    });

    function renderPreview(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'position-relative';
            wrapper.style.width = '100px';
            wrapper.setAttribute('data-id', file.uniqueId);

            wrapper.innerHTML = `
                <img src="${e.target.result}" class="rounded border shadow-sm" 
                     style="width: 100px; height: 100px; object-fit: cover;">
                <span class="remove-btn">&times;</span>
            `;

            // Xử lý nút xóa
            wrapper.querySelector('.remove-btn').onclick = function () {
                // Xóa khỏi mảng dữ liệu
                allFiles = allFiles.filter(f => f.uniqueId !== file.uniqueId);
                // Xóa khỏi giao diện
                wrapper.remove();
                checkEmpty();
                console.log("Files còn lại:", allFiles);
            };

            galleryPreview.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    }

    function checkEmpty() {
        if (allFiles.length > 0) {
            if (emptyMessage) emptyMessage.style.display = 'none';
        } else {
            if (emptyMessage) emptyMessage.style.display = 'block';
        }
    }
});