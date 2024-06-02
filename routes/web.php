<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\LaunguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveController;
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
Route::get('/dashboard', function () {
    return view('notVerificated');
})->name('notVerificated');

Route::resource('employees', EmployeesController::class)
    ->only(['index', 'store', 'show', 'destroy', 'edit', 'update'])
    ->middleware(['auth', 'verificated']); 
Route::get('employees/{id}/create', [EmployeesController::class, 'create_from_user'])->name('employees.create_from_user');
    
Route::resource('transactions', TransactionsController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verificated']); 
    
Route::get('/statistics', function () {
    return view('statistics');
})->name('notVerificated');

require __DIR__.'/auth.php';

/* 
        $apiKey = env('ALPHA_VANTAGE_API_KEY');
        //$apiKey = 'WK1YDEUZVY3PA0O6';
        $baseUrl = 'https://www.alphavantage.co/query';
        $commodity = 'AAPL';

        $response = Http::get($baseUrl, [
            'function' => 'ALUMINUM',
            'interval' => 'monthly',
            'apikey' => $apiKey,
        ]);

        if ($response->successful()) {
            $result = $response->json();
            return view('commodity', compact('result'));
        }

        return view('commodity');      


        name: {{$result['name']}} <br>
interval {{$result['interval']}} <br>
unit {{$result['unit']}} <br>
date {{$result['data'][0]['date']}} <br>
value {{$result['data'][0]['value']}} <br>

*/