<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="auth-header-bg"></div>

            <div class="modal-body px-4 pt-0 pb-5 position-relative">
                <div class="text-end pt-3">
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="text-center mb-4 mt-2">
                    <div class="auth-logo-circle mb-3">
                        <i class="bi bi-person-plus-fill text-primary"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">Tạo Tài Khoản Mới</h4>
                    <p class="text-muted small">Trở thành thành viên của MTShop ngay hôm nay</p>
                </div>

                <form id="registerForm" action="{{ route('register') }}" method="POST" class="auth-form" novalidate>
                    @csrf
                    <div id="registerAlert" class="alert alert-dismissible fade d-none m-0 mb-3" role="alert">
                        <span class="alert-text"></span>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Họ và Tên</label>
                        <div class="input-group custom-input-group shadow-sm">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-person text-secondary"></i>
                            </span>
                            <input type="text" name="name" class="form-control border-start-0 ps-0"
                                placeholder="Nhập họ tên...">
                        </div>
                        <div class="error-name text-danger error-message mt-1"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Số điện thoại</label>
                        <div class="input-group custom-input-group shadow-sm">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-phone text-secondary"></i>
                            </span>
                            <input type="tel" name="phone" class="form-control border-start-0 ps-0"
                                placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="error-phone text-danger error-message mt-1"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Email</label>
                        <div class="input-group custom-input-group shadow-sm">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-envelope text-secondary"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0 ps-0"
                                placeholder="Nhập email...">
                        </div>
                        <div class="error-email text-danger error-message mt-1"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Mật khẩu</label>
                        <div class="input-group custom-input-group shadow-sm">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-key text-secondary"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 ps-0"
                                placeholder="Nhập mật khẩu...">
                        </div>
                        <div class="error-password text-danger error-message mt-1"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Xác nhận mật khẩu</label>
                        <div class="input-group custom-input-group shadow-sm">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-check2-circle text-secondary"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control border-start-0 ps-0"
                                placeholder="Nhập lại mật khẩu...">
                        </div>
                    </div>

                    <button type="submit" id="btnRegister"
                        class="btn btn-primary w-100 fw-bold py-2-5 rounded-3 btn-tech-gradient shadow-sm mt-2">
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        ĐĂNG KÝ TÀI KHOẢN
                    </button>
                </form>

                <div class="text-center mt-4">
                    <span class="small text-secondary">Bạn đã có tài khoản?</span>
                    <a href="#" class="small fw-bold text-primary text-decoration-none ms-1" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Đăng nhập ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('user-assets/css/app.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/admin/admin-alert.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#registerForm').on('submit', function (e) {
                e.preventDefault();
                let form = $(this);
                let btn = $('#btnRegister');
                let spinner = btn.find('.spinner-border');

                // Reset trạng thái UI cũ
                $('.error-message').text('');
                $('.form-control').removeClass('is-invalid');
                btn.prop('disabled', true);
                spinner.removeClass('d-none');
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        btn.prop('disabled', false);
                        spinner.addClass('d-none');
                        if (response.success) {
                            sessionStorage.setItem('register_success', response.message);
                            window.location.href = "{{ url('/') }}";
                        }
                    },
                    error: function (xhr) {
                        btn.prop('disabled', false);
                        spinner.addClass('d-none');

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('[name="' + key + '"]').addClass('is-invalid');
                                $('.error-' + key).text(value[0]);
                            });
                        } else {
                            let errorMsg = xhr.responseJSON.message || "Đã có lỗi xảy ra!";
                            showAlert("registerAlert", errorMsg, "danger", 5000);
                        }
                    }
                });
            });
        });
    </script>
@endpush