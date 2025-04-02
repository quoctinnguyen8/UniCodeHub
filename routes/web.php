<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::put('/users/block/{id}', [AdminController::class, 'blockUser'])->name('users.block');
    Route::get('/users/unblock/{id}', [AdminController::class, 'unblockUser'])->name('users.unblock');
    Route::post('/users/add', [AdminController::class, 'addUser'])->name('users.add');
    Route::put('/users/update/{id}', [AdminController::class, 'updateUser'])->name('users.update');
});