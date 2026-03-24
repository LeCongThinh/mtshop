<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />
    <title>@yield('web-title', 'MTShop - Chuyên cung cấp các dòng máy tính, laptop')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/images/laptopshop.png") }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset("user-assets/css/styles.css") }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("user-assets/css/app.css") }}">
    {{-- Truyền route và csrf sang file JS riêng --}}
    <script>
        window.CART = {
            addUrl: "{{ route('cart.add') }}",
            updateUrl: "/cart/",
            removeUrl: "/cart/",
            cartUrl: "{{ route('cart.index') }}",
        };
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header-->
    <!-- Sử dụng view composer chia sẻ biến $categories cho tất cả các file blade nằm trong thư mục 'user'.
     Cấu hình trong hàm boot AppServiceProvider -->
    @include("user.layouts.header")

    <!-- Slider ở trang home-page.blade.php -->

    <main class="flex-fill">
        @yield('content')
    </main>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MTShop 2026</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS load images, specs in product detail -->
    <script src="{{ asset("user-assets/js/handle-product-detail.js") }}"></script>
    <!-- Thêm sp vào giỏ hàng -->
    <script src="{{ asset("user-assets/js/product-to-cart.js") }}"></script>
    <!-- Cập nhật/xóa thông tin giỏ hàng -->
    <script src="{{ asset("user-assets/js/handle-cart-detail.js") }}"></script>
    <script src="{{ asset("assets/js/admin/admin-alert.js") }}"></script>


    {{-- Cho phép các trang con nhúng JS riêng qua @push('scripts') --}}
    @stack('scripts')
</body>

</html>