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
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/theme.min.css") }}" />
</head>

<body>
    <!-- Danh mục trang admin -->
    @include("admin.layouts.sidebar")

    <!-- Header trang admin -->
    @include("admin.layouts.header")

    <!-- Nội dung trang Admin, dùng làm partial -->
    <main class="nxl-container">
        <div class="nxl-content">
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
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Quay lại</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Nội dung trang chính -->
            <div class="main-content">
                @yield('content')
            </div>

        </div>

        <!-- Footer trang admin -->
        @include("admin.layouts.footer")

    </main>

    <script src="{{ asset("assets/vendors/js/vendors.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/daterangepicker.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/apexcharts.min.js")}}"></script>

    <script src="{{ asset("assets/vendors/js/circle-progress.min.js")}}"></script>

    <script src="{{ asset("assets/js/common-init.min.js")}}"></script>

    <script src="{{ asset("assets/js/dashboard-init.min.js")}}"></script>

    <script src="{{ asset("assets/js/theme-customizer-init.min.js")}}"></script>

</body>

</html>