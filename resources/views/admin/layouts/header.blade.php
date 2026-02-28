<header class="nxl-header">
    <div class="header-wrapper">
        <!-- Nút danh mục -->
        <div class="header-left d-flex align-items-center gap-4">
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <div class="nxl-navigation-toggle">
                <a href="javascript:void(0);" id="menu-mini-button">
                    <i class="feather-align-left"></i>
                </a>
                <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
            <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                    <i class="feather-align-left"></i>
                </a>
            </div>
        </div>

        <!-- Nút tùy chỉnh giao diện sáng-tối -->
        <div class="header-right ms-auto">
            <div class="d-flex align-items-center">
                <div class="nxl-h-item dark-light-theme">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                        <i class="feather-moon"></i>
                    </a>
                    <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                        <i class="feather-sun"></i>
                    </a>
                </div>
                <!-- Thông báo -->
                <div class="dropdown nxl-h-item">
                    <a class="nxl-head-link me-3" data-bs-toggle="dropdown" href="#" role="button"
                        data-bs-auto-close="outside">
                        <i class="feather-bell"></i>
                        <span class="badge bg-danger nxl-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
                        <div class="d-flex justify-content-between align-items-center notifications-head">
                            <h6 class="fw-bold text-dark mb-0">Thông báo</h6>
                            <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto"
                                data-bs-toggle="tooltip" title="Make as Read">
                                <i class="feather-check"></i>
                                <span>Đánh dấu đã đọc</span>
                            </a>
                        </div>
                        <div class="notifications-item">
                            <img src="{{ asset("assets/images/avatar/2.png") }}" alt="" class="rounded me-3 border" />
                            <div class="notifications-desc">
                                <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span
                                        class="fw-semibold text-dark">Malanie Hanvey</span> We should talk about
                                    that at lunch!</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notifications-date text-muted border-bottom border-bottom-dashed">2
                                        minutes ago</div>
                                    <div class="d-flex align-items-center float-end gap-2">
                                        <a href="javascript:void(0);"
                                            class="d-block wd-8 ht-8 rounded-circle bg-gray-300"
                                            data-bs-toggle="tooltip" title="Make as Read"></a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip"
                                            title="Remove">
                                            <i class="feather-x fs-12"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="notifications-item">
                            <img src="{{ asset("assets/images/avatar/3.png") }}" alt="" class="rounded me-3 border" />
                            <div class="notifications-desc">
                                <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span
                                        class="fw-semibold text-dark">Valentine Maton</span> You can download the
                                    latest invoices now.</a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notifications-date text-muted border-bottom border-bottom-dashed">36
                                        minutes ago</div>
                                    <div class="d-flex align-items-center float-end gap-2">
                                        <a href="javascript:void(0);"
                                            class="d-block wd-8 ht-8 rounded-circle bg-gray-300"
                                            data-bs-toggle="tooltip" title="Make as Read"></a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip"
                                            title="Remove">
                                            <i class="feather-x fs-12"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center notifications-footer">
                            <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">Xen tất cả</a>
                        </div>
                    </div>
                </div>

                <!-- Avata người dùng đăng nhập -->
                <div class="dropdown nxl-h-item">
                    <a href="javascript:void(0);" class="d-flex align-items-center" data-bs-toggle="dropdown"
                        role="button" data-bs-auto-close="outside">

                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/images/avatar/1.png') }}"
                            class="img-fluid user-avtar" width="35" height="35"
                            style="border-radius:50%; object-fit:cover;" />

                        <span class="fw-semibold">
                            {{ Auth::user()->name }}
                        </span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="feather-user"></i>
                            <span>Thông tin cá nhân</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="feather-settings"></i>
                            <span>Đổi mật khẩu</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route("admin.logout") }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item w-80 text-start">
                                <i class="feather-log-out"></i>
                                <span>Đăng xuất</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.nxl-h-item').forEach(function (dropdown) {
            dropdown.addEventListener('mouseenter', function () {
                let menu = this.querySelector('.dropdown-menu');
                menu.classList.add('show');
            });
            dropdown.addEventListener('mouseleave', function () {
                let menu = this.querySelector('.dropdown-menu');
                menu.classList.remove('show');
            });
        });
    </script>
</header>