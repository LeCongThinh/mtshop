document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("categoryForm");
    if (!form) return;

    form.addEventListener("submit", function (e) {

        e.preventDefault();
        let formData = new FormData(form);

        // Xóa lỗi cũ
        form.querySelectorAll(".is-invalid").forEach(el => {
            el.classList.remove("is-invalid");
        });
        form.querySelectorAll(".invalid-feedback").forEach(el => {
            el.remove();
        });

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: formData

        }).then(async response => {

            const data = await response.json();
            if (response.status === 422) {
                Object.keys(data.errors).forEach(function (field) {
                    // nếu lỗi slug thì hiển thị vào categoryName
                    let inputName = field === "slug" ? "categoryName" : field;
                    let input = form.querySelector(`[name="${inputName}"]`);
                    if (input) {
                        input.classList.add("is-invalid");
                        let error = document.createElement("div");
                        error.classList.add("invalid-feedback");
                        error.innerText = data.errors[field][0];
                        input.after(error);
                    }
                });
                return;
            }
            if (!response.ok) {
                showAlert(
                    "categoryAlert",
                    data.error ?? "Đã có lỗi xảy ra",
                    "danger"
                );
                return;
            }
            showAlert(
                "categoryAlert",
                data.success,
                "success"
            );
            // thêm option mới vào select, sau khi thêm mới danh mục
            if (data.category.parent_id === null) {
                const select = document.querySelector('select[name="parent_id"]');
                const newOption = document.createElement("option");
                newOption.value = data.category.id;
                newOption.text = data.category.name;
                select.appendChild(newOption);
            }
            form.reset();
        });
    });
});