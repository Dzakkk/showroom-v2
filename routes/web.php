<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\CreditController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Cash routes
Route::resource('cash', CashController::class);

// Cicilan routes
Route::resource('cicilan', CicilanController::class);

// Pembeli routes
Route::resource('pembeli', PembeliController::class);

// Credit routes
Route::resource('kredit', CreditController::class);
