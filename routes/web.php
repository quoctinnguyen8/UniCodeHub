<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::put('/users/block/{id}', [AdminController::class, 'blockUser'])->name('users.block');
    Route::get('/users/unblock/{id}', [AdminController::class, 'unblockUser'])->name('users.unblock');
});
