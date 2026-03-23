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

                <form action="{{ route('register') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Họ và Tên</label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-person text-secondary"></i>
                            </span>
                            <input type="text" name="name" class="form-control border-start-0 ps-0"
                                placeholder="Nhập họ tên..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Số điện thoại</label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-phone text-secondary"></i>
                            </span>
                            <input type="tel" name="phone" class="form-control border-start-0 ps-0"
                                placeholder="Nhập số điện thoại..." required>
                        </div>
                    </div>
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

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Mật khẩu</label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text border-end-0 bg-transparent">
                                <i class="bi bi-key text-secondary"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 ps-0"
                                placeholder="Nhập mật khẩu..." required>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary w-100 fw-bold py-2-5 rounded-3 btn-tech-gradient shadow-sm">
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