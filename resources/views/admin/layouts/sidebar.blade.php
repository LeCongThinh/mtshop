<!-- Danh mục admin -->
<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route("admin.dashboard") }}"
                class="b-brand w-100 d-flex align-items-center justify-content-center gap-2">
                <!-- ========  LOGO  ============ -->
                <div class="logo logo-lg">
                    <h3 class="mb-0">MTSHOP.COM</h3>
                </div>
                <img src="{{ asset("assets/images/icon-laptopshop.png") }}" alt="" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <!-- Thống kê đơn hàng -->
                <li
                    class="nxl-item nxl-hasmenu {{ request()->routeIs("admin.dashboard") ? "active nxl-trigger" : "" }}">
                    <a href="{{ route("admin.dashboard") }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Thống kê đơn hàng</span>
                    </a>
                </li>

                <!-- Quản lý danh mục -->
                <li class="nxl-item nxl-hasmenu" {{ request()->routeIs("admin.categories") ? "active nxl-trigger" : "" }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-send"></i></span>
                        <span class="nxl-mtext">Quản lý danh mục & hãng</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a
                                class="nxl-link {{ request()->routeIs("admin.categories") ? "active" : "" }}"
                                href="{{ route("admin.categories") }}">Danh sách danh mục & hãng</a>
                        </li>
                        <li class="nxl-item"><a
                                class="nxl-link {{ request()->routeIs("admin.categories.create") ? "active" : "" }}"
                                href="{{ route("admin.categories.create") }}">Thêm mới danh mục & hãng</a>
                        </li>
                    </ul>
                </li>

                <!-- Quản lý tài khoản -->
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs("admin.accounts") ? "active nxl-trigger" : "" }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Quản lý tài khoản</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a
                                class="nxl-link {{ request()->routeIs("admin.accounts") ? "active" : "" }}"
                                href="{{ route("admin.accounts") }}">Danh sách tài khoản</a></li>

                        <li class="nxl-item"><a
                                class="nxl-link {{ request()->routeIs("admin.accounts.create") ? "active" : "" }}"
                                href="{{ route("admin.accounts.create") }}">Thêm mới tài khoản</a>
                        </li>
                    </ul>
                </li>

                <!-- Quản lý sản phẩm -->
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                        <span class="nxl-mtext">Quản lý sản phẩm</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="projects.html">Danh sách sản phẩm</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="projects-create.html">Thêm mới sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <!-- Quản lý đơn hàng -->
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                        <span class="nxl-mtext">Quản lý đơn hàng</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="payment.html">Danh sách đơn hàng</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="invoice-create.html">Thêm mới đơn hàng</a>
                        </li>
                    </ul>
                </li>
                <!-- Quản lý bài viết -->
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                        <span class="nxl-mtext">Quản lý bài viết</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a class="nxl-link" href="leads.html">Danh sách bài viết</a></li>
                        <li class="nxl-item"><a class="nxl-link" href="leads-create.html">Thêm mới bài viết</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>