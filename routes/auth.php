<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('forgot-password', [AuthController::class, 'forgot_password'])->name('forgot_password');
    Route::post('forgot-password', [AuthController::class, 'sendPasswordResetToken'])->name('sendPasswordResetToken');
    Route::get('restart-password/{token}', [AuthController::class, 'restartPassword'])->name('restartPassword');
    Route::post('restart-password/{token}', [AuthController::class, 'changePassword'])->name('changePassword');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
