<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubcriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/register');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::get('/user/{user:uuid}/edit', [UserController::class, 'edit'])->name('user.edit');

    Route::resource('subscription', SubcriptionController::class);
});
