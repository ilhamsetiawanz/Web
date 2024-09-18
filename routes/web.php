<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DataPenyakitController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\WebPagesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('processLogin');
});


Route::get('/', [WebPagesController::class, 'home'])->name('Home');
Route::get('/diagnosa', [WebPagesController::class, 'diagnosaPage'])->name('Diagnosa');


Route::middleware('auth')->group(function () {
    Route::prefix('Admin')->middleware('rolemanager:admin')->group(function () {
        // Dashboard Admin
        Route::get('/', [AdminController::class, 'DashboardAdmin'])->name('Admin');

        // Data Gejala
        Route::prefix('data-gejala')->group(function () {
            Route::get('/', [DataGejalaController::class, 'index'])->name('data-gejala');
            Route::post('/add', [DataGejalaController::class, 'store'])->name('add-gejala');
            Route::put('/edit/{dataGejala}', [DataGejalaController::class, 'update'])->name('edit-gejala');
            Route::delete('/delete/{dataGejala}', [DataGejalaController::class, 'destroy'])->name('delete-gejala');
        });

        // Data Penyakit
        Route::prefix('data-penyakit')->group(function () {
            Route::get('/', [DataPenyakitController::class, 'index'])->name('data-penyakit');
            Route::post('/add', [DataPenyakitController::class, 'store'])->name('add-penyakit');
            Route::put('/edit/{dataPenyakit}', [DataPenyakitController::class, 'update'])->name('edit-penyakit');
            Route::delete('/delete/{dataPenyakit}', [DataPenyakitController::class, 'destroy'])->name('delete-penyakit');
        });

        // Data Aturan
        Route::get('data-aturan', [RuleController::class, 'index'])->name('data-aturan');
    });
    Route::get('/diagnosis/start', [DiagnosisController::class, 'getQuestion']);
    Route::post('/diagnosis/answer', [DiagnosisController::class, 'diagnosis']);
    Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');
});
