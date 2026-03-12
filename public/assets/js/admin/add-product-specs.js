document.addEventListener('DOMContentLoaded', function () {
    const specsList = document.getElementById('specs-list');
    const addBtn = document.getElementById('add-spec');

    // 1. Xử lý khi nhấn nút "Thêm dòng mới"
    addBtn.addEventListener('click', function () {
        // Tạo một thẻ div bọc ngoài cho hàng mới
        const newRow = document.createElement('div');
        newRow.className = 'row g-3 mb-3 spec-item'; // Giữ nguyên class của bạn

        // Cấu trúc HTML bên trong (giống hệt hàng mẫu của bạn)
        newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="spec_name[]" class="form-control"
                    placeholder="Tên: CPU, RAM, Pin...">
            </div>
            <div class="col-md-7">
                <input type="text" name="spec_value[]" class="form-control"
                    placeholder="Giá trị: Core i7, 16GB...">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline-danger w-100 remove-spec">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;

        // Thêm hàng mới vào danh sách
        specsList.appendChild(newRow);

        // Tự động focus vào ô nhập liệu đầu tiên của hàng mới để người dùng gõ luôn
        newRow.querySelector('input').focus();

        // TỰ ĐỘNG CUỘN XUỐNG ĐÁY để thấy dòng mới (trên 5 dòng)
        specsList.scrollTo({
            top: specsList.scrollHeight,
            behavior: 'smooth' // Cuộn mượt mà
        });
    });

    // 2. Xử lý khi nhấn nút "Xóa"
    // Sử dụng event delegation để bắt được các nút mới được thêm vào sau này
    specsList.addEventListener('click', function (e) {
        // Kiểm tra nếu phần tử được click là nút xóa hoặc icon bên trong nút xóa
        if (e.target.closest('.remove-spec')) {
            const allItems = document.querySelectorAll('.spec-item');

            // Chỉ cho phép xóa nếu có nhiều hơn 1 dòng
            if (allItems.length > 1) {
                e.target.closest('.spec-item').remove();
            } else {
                // Nếu chỉ còn 1 dòng thì reset trắng các ô input thay vì xóa dòng
                const inputs = allItems[0].querySelectorAll('input');
                inputs.forEach(input => input.value = '');
                alert('Phải giữ lại ít nhất một dòng thông số!');
            }
        }
    });
});