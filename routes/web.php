<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::resource('leaves', LeaveController::class)
    ->only(['index', 'store', 'show', 'destroy'])
    ->middleware('auth'); 

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('employees', [EmployeesController::class, 'index'])->name('employees.index')->middleware('auth'); ;

require __DIR__.'/auth.php';