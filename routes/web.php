<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

### User ###
Route::get("/", [HomeController::class, "home"])->name("home.index");

//Đăng nhập
// Route::get('/login', [UserController::class, 'showLogin'])->name('login');

Route::middleware(["auth"])->group(function () {

    // Trang đặt hàng yêu cầu user phải đăng nhập

});


### Admin ###
Route::prefix("admin")->group(function () {
    //Hien thi form dang nhap
    Route::get("/login", [AdminAuthController::class, "showLogin"])->name("admin.login");
    //Xu ly dang nhap
    Route::post("/login", [AdminAuthController::class, "handleLogin"])->name("admin.handleLogin");
    Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");
    //User bắt buộc phải đăng nhập
    // Route::middleware(["auth", "checkAdmin"])->group(function () {

    //     //Trang dashboard
    //     Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");

    //     //Trang quản lý sản phẩm

    // });
});
