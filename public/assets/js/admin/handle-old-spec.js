document.addEventListener('DOMContentLoaded', function () {
    const specsList = document.getElementById('specs-list');
    const addSpecBtn = document.getElementById('add-spec');

    // Thêm dòng mới
    addSpecBtn.addEventListener('click', function () {
        const newRow = `
            <div class="row g-3 mb-3 spec-item">
                <div class="col-md-4">
                    <input type="text" name="spec_name[]" class="form-control" placeholder="Tên: CPU, RAM, Pin...">
                </div>
                <div class="col-md-7">
                    <input type="text" name="spec_value[]" class="form-control" placeholder="Giá trị: Core i7, 16GB...">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-danger w-100 remove-spec">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>`;
        specsList.insertAdjacentHTML('beforeend', newRow);
    });

    // Xóa dòng (Dùng delegation)
    specsList.addEventListener('click', function (e) {
        if (e.target.closest('.remove-spec')) {
            const rows = specsList.querySelectorAll('.spec-item');
            if (rows.length > 1) {
                e.target.closest('.spec-item').remove();
            } else {
                // Nếu chỉ còn 1 dòng, xóa nội dung thay vì xóa row
                const inputs = rows[0].querySelectorAll('input');
                inputs.forEach(i => i.value = '');
            }
        }
    });
});