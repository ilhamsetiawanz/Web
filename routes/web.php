<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebPagesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [WebPagesController::class, 'home'])->name('Home');
});

Route::middleware('auth')->group(function () {
    // Verif Email
});