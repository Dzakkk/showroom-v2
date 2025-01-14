<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PurchasingController;

// Route::get('/dashboard', function () {
//     return view('layouts.home');
// });

// Auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
// Cash routes
Route::resource('cash', CashController::class);

// Motor routes
Route::resource('motor', MotorController::class);

// Cicilan routes
Route::resource('cicilan', CicilanController::class);

// Pembeli routes
Route::resource('pembeli', PembeliController::class);

// Credit routes
Route::resource('kredit', CreditController::class);

// Paket routes
Route::resource('paket', PaketController::class);
