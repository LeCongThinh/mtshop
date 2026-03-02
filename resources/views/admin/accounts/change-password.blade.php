<!-- Modal Đổi mật khẩu -->

<body>
    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Đổi mật khẩu không thành công -->
                <div class="alert alert-dismissible fade d-none" role="alert" id="changePasswordAlert">
                    <span id="changePasswordAlertText"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

                <form id="changePasswordForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Mật khẩu hiện tại <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="current_password" class="form-control"
                                placeholder="Nhập mật khẩu hiện tại...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Mật khẩu mới <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="new_password" class="form-control"
                                placeholder="Nhập mật khẩu mới...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Xác nhận mật khẩu mới <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="new_password_confirm" class="form-control"
                                placeholder="Xác nhận mật khẩu mới...">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    // Dùng AJAX để load form đổi mk, xử lý validate
    document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        // Xóa lỗi cũ
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

        fetch("{{ route('admin.accounts.changePassword') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json"
            },
            body: formData
        })
            .then(async response => {
                const data = await response.json();

                let alertBox = document.getElementById('changePasswordAlert');
                let alertText = document.getElementById('changePasswordAlertText');

                // Reset alert
                alertBox.classList.remove('d-none', 'alert-danger', 'alert-success');
                alertBox.classList.add('d-none');
                alertText.innerText = "";

                // Lỗi validate
                if (response.status === 422 && data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        let input = document.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.classList.add('is-invalid');

                            let div = document.createElement('div');
                            div.classList.add('invalid-feedback');
                            div.innerText = data.errors[key][0];
                            input.after(div);
                        }
                    });
                    return;
                }

                // Lỗi khác
                if (!response.ok) {
                    alertBox.classList.remove('d-none');
                    alertBox.classList.add('alert-danger', 'show');
                    alertText.innerText = data.error || 'Đã có lỗi xảy ra';
                    return;
                }

                // Đổi mk thành công
                alertBox.classList.remove('d-none');
                alertBox.classList.add('alert-success', 'show');
                alertText.innerText = data.success;

                form.reset();
            })
            .catch(error => console.log(error));
    });
</script>