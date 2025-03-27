<?php

use App\Http\Controllers\User\SubmissionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/submissionss', [SubmissionsController::class, 'store']);
Route::get('/submissions', [SubmissionsController::class, 'index']);