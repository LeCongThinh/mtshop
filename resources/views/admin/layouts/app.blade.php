<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <title>@yield('web-title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/images/laptopshop.png") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/vendors.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/daterangepicker.min.css") }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/dataTables.bs5.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/select2.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/select2-theme.min.css") }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/theme.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/app.css") }}" />
    <!-- CSS thư viện hiển thị alert dialog thông tin sản phẩm -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />


</head>

<body>
    <!-- Danh mục trang admin -->
    @include("admin.layouts.sidebar")

    <!-- Header trang admin -->
    @include("admin.layouts.header")

    <!-- Nội dung trang Admin, dùng làm partial -->
    <main class="nxl-container d-flex flex-column min-vh-100">
        <div class="nxl-content flex-grow-1">
            <!-- Header trang nội dung -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('header-title')</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Trang chủ</a></li>
                        <li class="breadcrumb-item">@yield('header-title')</li>
                    </ul>
                </div>
            </div>

            <!-- Nội dung trang chính -->
            <div class="main-content">
                <div id="mainAlert" class="alert d-none alert-dismissible fade show" role="alert">
                    <span class="alert-text"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @yield('content')
            </div>

        </div>

        <!-- Footer trang admin -->
        @include("admin.layouts.footer")

    </main>

    <script src="{{ asset("assets/vendors/js/vendors.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/dataTables.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/dataTables.bs5.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/select2.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/select2-active.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/daterangepicker.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/apexcharts.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/circle-progress.min.js")}}"></script>

    <script src="{{ asset("assets/js/common-init.min.js")}}"></script>

    <script src="{{ asset("assets/js/customers-init.min.js")}}"></script>

    <script src="{{ asset("assets/js/payment-init.min.js") }}"></script>

    <script src="{{ asset("assets/js/dashboard-init.min.js")}}"></script>

    <script src="{{ asset("assets/js/theme-customizer-init.min.js")}}"></script>

    <!-- Thông báo -->
    <script src="{{ asset("assets/js/admin/admin-alert.js") }}"></script>
    <!-- Js thư viện hiển thị alert dialog thông tin sản phẩm -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    @stack('scripts')
</body>

</html>