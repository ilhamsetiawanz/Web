<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DataPenyakitController;
use App\Http\Controllers\WebPagesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [WebPagesController::class, 'home'])->name('Home');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('processLogin');
});

Route::middleware('auth')->group(function () {
    // Verif Email
});

// Data Gejala
Route::get('/Admin', [AdminController::class, 'DashboardAdmin'])->name('Admin');
Route::get('/Admin/data-gejala', [DataGejalaController::class, 'index'])->name('data-gejala');
Route::post('/Admin/data-gejala/add', [DataGejalaController::class, 'store'])->name('add-gejala');
Route::put('/Admin/data-gejala/edit/{dataGejala}', [DataGejalaController::class, 'update'])->name('edit-gejala');
Route::delete('/Admin/data-gejala/delete/{dataGejala}', [DataGejalaController::class, 'destroy'])->name('delete-gejala');

// Data Penyakit
Route::get('/Admin/data-penyakit', [DataPenyakitController::class, 'index'])->name('data-penyakit');
Route::post('/Admin/data-penyakit/add', [DataPenyakitController::class, 'store'])->name('add-penyakit');

