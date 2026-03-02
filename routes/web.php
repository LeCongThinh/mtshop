<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
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
    //View đăng nhập
    Route::get("/login", [AdminAuthController::class, "showLogin"])->name("admin.login");
    //Xử lý đăng nhập
    Route::post("/login", [AdminAuthController::class, "handleLogin"])->name("admin.handleLogin");
    //Đăng xuất
    Route::post("/logout", [AuthController::class, "logout"])->name("admin.logout");


    //View dashboard
    // Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");

    //User bắt buộc phải đăng nhập
    Route::middleware(["auth", "checkAdmin"])->group(function () {

        # Trang dashboard
        Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");

        //Đổi mật khẩu tk đang đăng nhập
        Route::put("accounts/change-password", [AccountController::class, "changePassword"])->name("admin.accounts.changePassword");

        # Trang quản lý tài khoản
        //Danh sách tài khoản
        Route::get("/accounts", [AccountController::class, "index"])->name("admin.accounts");
        //View thêm mới tài khoản
        Route::get("accounts/create", [AccountController::class, "create"])->name("admin.accounts.create");
        //Lưu tài khoản mới
        Route::post("accounts/store", [AccountController::class, "store"])->name("admin.accounts.store");
        //View edit tài khoản
        Route::get("accounts/{id}/edit", [AccountController::class, "edit"])->name("admin.accounts.edit");
        // Câp nhật thông tin tài khoản
        Route::put("accounts/{id}", [AccountController::class, "update"])->name("admin.accounts.update");
        //Xóa tài khoản
        Route::delete("accounts/{user}", [AccountController::class, "destroy"])->name("admin.accounts.destroy");
        //Khôi phục tài khoản đã xóa
        Route::patch("accounts/{id}/restore", [AccountController::class, "restore"])->name("admin.accounts.restore");
        
    });
});
