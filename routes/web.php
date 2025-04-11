<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExercisesController;
use App\Models\Exercises;
use App\Http\Controllers\Admin\TestCaseController;
use App\Models\TestCase;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('exercises')->group(function () {
    Route::get('/', [ExercisesController::class, 'index'])->name('exercises.index');
    Route::get('/create', [ExercisesController::class, 'create'])->name('exercises.create');
    Route::post('/store', [ExercisesController::class, 'store'])->name('exercises.store');
    Route::get('/edit/{id}', [ExercisesController::class, 'edit'])->name('exercises.edit');
    Route::put('/update/{id}', [ExercisesController::class, 'update'])->name('exercises.update');
    Route::delete('/destroy/{id}', [ExercisesController::class, 'destroy'])->name('exercises.destroy');
});
Route::prefix('testcases')->group(function () {
    Route::get('/', [TestCaseController::class, 'index'])->name('testcases.index');
    Route::get('/create', [TestCaseController::class, 'create'])->name('testcases.create');
    Route::post('/store', [TestCaseController::class, 'store'])->name('testcases.store');
    Route::get('/edit/{testCase}', [TestCaseController::class, 'edit'])->name('testcases.edit');
    Route::put('/update/{testCase}', [TestCaseController::class, 'update'])->name('testcases.update');
    Route::delete('/destroy/{testCase}', [TestCaseController::class, 'destroy'])->name('testcases.destroy');
});