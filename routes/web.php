<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductControler as UserProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;


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
// Trang chủ
Route::get("/", [HomeController::class, "home"])->name("home.index");
// Xem tất cả sản phẩm mới
Route::get("products/all", [UserProductController::class, "showAllProducts"])->name("all-products");
// Trang chi tiết sản phẩm
Route::get("products/{slug}", [UserProductController::class, "showProductDetail"])->name("home.product-detail");
// Trang sản phẩm theo danh mục chính
Route::get("category/{slug}", [HomeController::class, 'getProductByCategory'])->name('category.product');
// Xem tất cả bài viết
Route::get("blogs/all", [UserPostController::class, "showAllPosts"])->name("all-news");
//Trang chi tiết bài viết
Route::get("blogs/{slug}", [UserPostController::class, "showPostDetail"])->name("home.news-detail");




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

        #Trang quản lý danh mục
        //Danh sách danh mục và hãng sản xuất
        Route::get("/categories", [CategoryController::class, "index"])->name("admin.categories");
        //View thêm mới danh mục và hãng sản xuất
        Route::get("/categories/create", [CategoryController::class, "create"])->name("admin.categories.create");
        //Lưu danh mục và hãng sx
        Route::post("/categories/store", [CategoryController::class, "store"])->name("admin.categories.store");
        Route::post("/brands/store", [BrandController::class, "store"])->name("admin.brands.store");
        //View edit category
        Route::get("categories/{id}/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
        //Cập nhật category
        Route::put("categories/{id}", [CategoryController::class, "update"])->name("admin.categories.update");
        //Xóa category
        Route::delete("categories/{id}", [CategoryController::class, "destroy"])->name("admin.categories.destroy");
        //Restore category
        Route::patch("categories/{id}", [CategoryController::class, "restore"])->name("admin.categories.restore");
        //View edit brand
        Route::get("brands/{id}/edit", [BrandController::class, "edit"])->name("admin.brands.edit");
        //Cập nhật brand
        Route::put("brands/{id}", [BrandController::class, "update"])->name("admin.brands.update");
        //Xóa brand
        Route::delete("brands/{id}", [BrandController::class, "destroy"])->name("admin.brands.destroy");
        //Restore brand
        Route::patch("brands/{id}", [BrandController::class, "restore"])->name("admin.brands.restore");

        #Trang quản lý sản phẩm
        //Danh sách sản phẩm
        Route::get("products", [AdminProductController::class, "index"])->name("admin.products");
        //View thêm mới sản phẩm
        Route::get("products/create", [AdminProductController::class, "create"])->name("admin.products.create");
        //Lưu sản phẩm
        Route::post("products/store", [AdminProductController::class, "store"])->name("admin.products.store");
        //View xem thong tin sản phẩm
        Route::get("products/{id}/show", [AdminProductController::class, "show"])->name("admin.products.show");
        //View edit sản phẩm
        Route::get("products/{id}/edit", [AdminProductController::class, "edit"])->name("admin.products.edit");
        //Cập nhật sản phẩm
        Route::put("products/{id}", [AdminProductController::class, "update"])->name("admin.products.update");
        //Xóa sản phẩm
        Route::delete("products/{id}", [AdminProductController::class, "destroy"])->name("admin.products.destroy");
        //Restore sản phẩm
        Route::patch("products/{id}", [AdminProductController::class, "restore"])->name("admin.products.restore");

        #Trang quản lý bài viết
        //Danh sách bài viết
        Route::get("posts", [AdminPostController::class, "index"])->name("admin.posts");
        //View thêm mới bài viết
        Route::get("posts/create", [AdminPostController::class, "create"])->name("admin.posts.create");
        //Lưu bài viết
        Route::post("posts/store", [AdminPostController::class, "store"])->name("admin.posts.store");
        //View xem trước bài viết
        Route::get("posts/{id}/show", [AdminPostController::class, "show"])->name("admin.posts.show");
        //View edit bài viết
        Route::get("posts/{id}/edit", [AdminPostController::class, "edit"])->name("admin.posts.edit");
        //Cập nhật bài viết
        Route::put("posts/{id}", [AdminPostController::class, "update"])->name("admin.posts.update");
        //Xóa bài viết
        Route::delete("posts/{id}", [AdminPostController::class, "destroy"])->name("admin.posts.destroy");
        //Khôi phục bài viết
        Route::patch("posts/{id}", [AdminPostController::class, "restore"])->name("admin.posts.restore");
    });
});
