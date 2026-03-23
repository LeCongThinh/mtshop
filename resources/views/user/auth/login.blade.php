<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                        <i class="bi bi-shield-lock-fill text-primary"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-1" id="loginModalLabel">MTShop Xin Chào!</h4>
                    <p class="text-muted small">Vui lòng đăng nhập để tiếp tục mua sắm</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Email</label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-envelope text-secondary"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0 ps-0"
                                placeholder="Nhập email..." required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small fw-bold text-dark">Mật khẩu</label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-key text-secondary"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 ps-0"
                                placeholder="Nhập mật khẩu..." required>
                        </div>
                    </div>

                    <div class="text-end mt-2 mb-3">
                        <a href="#" class="text-primary text-decoration-none small fw-semibold">Quên mật khẩu?</a>
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 fw-bold py-2-5 rounded-3 btn-tech-gradient shadow-sm">
                        ĐĂNG NHẬP
                    </button>
                </form>

                <div class="position-relative my-4 text-center">
                    <hr class="text-light-emphasis">
                    <span
                        class="position-absolute top-50 start-50 translate-middle bg-white px-3 small text-secondary">Hoặc
                        dùng</span>
                </div>

                <div class="d-flex gap-2 mb-4">
                    <button
                        class="btn btn-outline-light border w-100 py-2 d-flex align-items-center justify-content-center gap-2 text-dark small fw-semibold rounded-3 btn-social">
                        <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" width="16"> Google
                    </button>
                    
                </div>

                <div class="text-center">
                    <span class="small text-secondary">Chưa có tài khoản tại MTShop?</span>
                    <a href="#" class="small fw-bold text-primary text-decoration-none ms-1">Tạo tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>