<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SubcriptionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResource('users', UserController::class);

    Route::prefix('users')->group(function () {
        Route::put('{user:uuid}', [UserController::class, 'update'])->name('users.update');
        Route::delete('{user:uuid}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::apiResource('subscription', SubcriptionController::class);
    Route::delete('subscription/{subscription:uuid}', [SubcriptionController::class, 'destroy']);
    Route::get('/subscription/token/{token}', [SubcriptionController::class, 'cekToken']);
});
