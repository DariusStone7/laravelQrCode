<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->controller(AuthController::class)->name('auth.')->group(function(){
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('doLogin', 'doLogin')->name('doLogin')->middleware('guest');
    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::resource('employe', EmployerController::class);
    Route::resource('guest', GuestController::class);
});

// Route::get('/scan', [GuestController::class, 'scanQrCode'])->name('guest.scan');

Route::get('/guest/scan', [GuestController::class, 'scanQrCode'])->middleware('auth')->name('guest.scan');
