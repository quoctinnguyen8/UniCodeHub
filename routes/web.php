<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
Route::get("/dang-ky",[AccountController::class,"register"])->name("register");
Route::post("/dang-ky", [AccountController::class, "registerPost"])->name("register.post");

Route::get("/dang-nhap",[AccountController::class,"login"])->name("login");
Route::post("/dang-nhap", [AccountController::class, "loginPost"])->name("login.post");
});