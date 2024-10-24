<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DataPenyakitController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportHistory;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebPagesController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('processLogin');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('processRegister');
    
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
        Route::prefix('data-aturan')->group(function () {
            Route::get('/', [RuleController::class, 'index'])->name('data-aturan');

        });

        Route::prefix('laporan-bulanan')->group(function () {
            Route::get('/', [ReportController::class, 'index'])->name('laporan-bulanan');
        });

        // Data Artikel
        Route::prefix('data-artikel')->group(function () {
            Route::get('/', [ArtikelController::class, 'index'])->name('data-artikel');
        });
    });    

    Route::group(['as' => 'diagnosa.'], function () {
        Route::post('/diagnosis', [DiagnosaController::class, 'diagnosis'])->name('post'); 
        Route::get('/detail-diagnosis', [UserController::class, 'detailDiagnosis'])->name('detailDiagnosis');
        Route::get('/get-gejala', [UserController::class, 'getGejala'])->name('getGejala');
        // Route::get('/detailDiagnosis', UserController::class, 'detailDiagnosis')->name('details')
    });
    Route::prefix('profile')->group(function() {
        Route::get('/', [PetaniController::class, 'petaniView'])->name('profile');
        Route::get('/hasil-diagnosa', [ReportHistory::class, 'GetHistoryUser'])->name('history.get');
        Route::get('hasil-diagnosa/details/{report}', [ReportHistory::class, 'DetailDiagnosisId'])->name('details');
    });  
    Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');
});
