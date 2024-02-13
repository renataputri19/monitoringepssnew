<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KdController;
use App\Http\Controllers\SnController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PbsController;
use App\Http\Controllers\SdiController;
use App\Http\Controllers\EpssController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\IndikatorApprovalController;

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





// Publicly accessible routes
Route::get('/',[HomeController::class, 'home']);


// Routes for guests only
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});


// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/epss',[EpssController::class, 'epss'])->name('epss');

    Route::get('/sdi',[SdiController::class, 'sdi'])->name('sdi');
    Route::get('/kualitas-data',[KdController::class, 'kd']);
    Route::get('/proses-bisnis-statistik',[PbsController::class, 'pbs']);
    Route::get('/kelembagaan',[KelembagaanController::class, 'kelembagaan']);
    Route::get('/statistik-nasional',[SnController::class, 'sn']);
    Route::get('/list-opd', [OpdController::class, 'index'])->name('list-opd');
    Route::get('/opd/create', [OpdController::class, 'create'])->name('opd.create');
    Route::get('/opd/{id}/edit', [OpdController::class, 'edit'])->name('opd.edit');
    Route::put('/opd/{id}', [OpdController::class, 'update'])->name('opd.update');

    Route::post('/opd', [OpdController::class, 'store'])->name('opd.store');

    Route::delete('/opd/{id}', [OpdController::class, 'destroy'])->name('opd.destroy');


    
    Route::post('/file-upload', [FileController::class, 'upload'])->name('file.upload');
    
    
    Route::post('/files/{id}/approve', [FileController::class, 'approve'])->name('file.approve');
    Route::post('/files/{id}/disapprove', [FileController::class, 'disapprove'])->name('file.disapprove');
    Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');
    
    Route::get('/dashboard', [DashboardController::class, 'calculateScores'])->name('dashboard');
    
    
    Route::post('/indikator-approval', [IndikatorApprovalController::class, 'approve'])->name('indikator.approve');
    
    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout');
});


