<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/all', [BookingController::class, 'all']);
Route::get('/user/{id}/all', [UserController::class, 'all']);
Route::get('/{id}', [BookingController::class, 'view']);
Route::get('/delete/{id}', [BookingController::class, 'delete']);

Route::middleware('identified')->group(function() {
    Route::post('/create', [BookingController::class, 'create']);
    Route::post('/update/{id}', [BookingController::class, 'update']);
});
