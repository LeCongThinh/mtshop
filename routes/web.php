<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

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
Route::get("/",[HomeController::class, "home"])->name("home.index");

### Admin ###
//Dang nhap
Route::prefix("admin")->group(function () {
    Route::get("/login", [AdminAuthController::class, "showLogin"]);

});
