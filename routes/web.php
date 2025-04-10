<?php

use App\Http\Controllers\LessonCategoryController;
use App\Http\Controllers\LessonController;
use App\Models\Lesson;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lessons', LessonController::class);
Route::resource('lesson_categories', LessonCategoryController::class);
