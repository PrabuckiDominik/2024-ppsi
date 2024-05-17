<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('welcome');
});
