<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\LaunguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

Route::post('/switch-language', [LaunguageController::class, 'switchLanguage'])->name('lang.switch');

Route::resource('leaves', LeaveController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verificated']); 

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('welcome');
});
Route::get('/notVerificated', function () {
    return view('notVerificated');
})->name('notVerificated');

Route::resource('employees', EmployeesController::class)
    ->only(['index', 'store', 'show', 'destroy', 'edit', 'update'])
    ->middleware(['auth', 'verificated']); 
Route::get('employees/{id}/create', [EmployeesController::class, 'create_from_user'])->name('employees.create_from_user');
    
Route::resource('transactions', TransactionsController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verificated']); 
    
Route::get('/statistics', [StatisticsController::class, 'index'])
    ->name('statistics.index')
    ->middleware(['auth', 'verificated']); ;

require __DIR__.'/auth.php';
