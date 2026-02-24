<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <!--! BEGIN: Apps Title-->
    <title>Login Admin - MTShop</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/images/laptopshop.png") }}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/vendors.min.css") }}">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/theme.min.css") }}">
    <!--! END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/app.css") }}">
</head>

<body>
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset("assets/images/icon-laptopshop.png") }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-22 fw-bolder mb-3">ĐĂNG NHẬP - MTSHOP.COM</h2>

                        <!-- Trả ra thông báo lỗi nếu đăng nhập sai -->
                        <!-- Lỗi validate -->
                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <!-- Lỗi thông tin đăng nhập -->
                        @if(session("error"))
                            <div class="alert alert-danger">{{ session("error") }}</div>
                        @endif

                        <form action="{{ route("admin.handleLogin") }}" method="post" class="w-100 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="email" name="txtEmail" class="form-control" placeholder="Nhập email">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="txtPass" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="d-flex justify-content-end">

                                <div>
                                    <a href="auth-reset-minimal.html" class="fs-11 text-primary">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Đăng nhập</button>
                            </div>
                        </form>

                        <!-- Đăng nhập bằng tk google -->
                        <!-- <div class="w-100 mt-4 text-center mx-auto">
                            <div class="mb-4 border-bottom position-relative"><span
                                    class="small py-1 px-3 text-uppercase text-muted bg-white position-absolute translate-middle">Hoặc</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <a href="javascript:void(0);"
                                    class="btn btn-light border flex-fill d-flex align-items-center justify-content-center gap-2">
                                    <img src="{{ asset("assets/images/google.png") }}" width="20" height="20"> Đăng nhập
                                    với Google
                                </a>
                            </div>
                        </div> -->
                        <!-- Đăng ký tài khoản -->
                        <!-- <div class="mt-5 text-muted">
                            <span> Bạn chưa có tài khoản?</span>
                            <a href="auth-register-minimal.html" class="fw-bold">Tạo tài khoản</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset("assets/vendors/js/vendors.min.js") }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset("assets/js/common-init.min.js") }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset("assets/js/theme-customizer-init.min.js") }}"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>