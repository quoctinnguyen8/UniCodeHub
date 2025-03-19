<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExerciseController;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('exercises')->group(function () {
    Route::get('/', [ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/create', [ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/store', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/edit/{id}', [ExerciseController::class, 'edit'])->name('exercises.edit');
    Route::put('/update/{id}', [ExerciseController::class, 'update'])->name('exercises.update');
    Route::delete('/destroy/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
});