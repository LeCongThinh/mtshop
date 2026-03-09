document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("brandForm");
    if (!form) {
        return;
    }
    form.addEventListener("submit", function (e) {

        e.preventDefault();
        let formData = new FormData(form);

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

                    let input = form.querySelector(`[name="${field}"]`);

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
                    "brandAlert",
                    data.error ?? "Đã có lỗi xảy ra",
                    "danger"
                );
                return;
            }
            showAlert(
                "brandAlert",
                data.success,
                "success"
            );
            form.reset();
        })
    })
})