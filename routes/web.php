<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SdiController;
use App\Http\Controllers\EpssController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorApprovalController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',[HomeController::class, 'home']);


Route::get('/epss',[EpssController::class, 'epss']);
// Route::get('/epss', function () {
//     return view('epss');
// });

// Add this line to define the /sdi route
// Route::get('/sdi', function () {
//     return view('sdi');
// });
Route::get('/sdi',[SdiController::class, 'sdi']);

// GET route for displaying the form
// Route::get('/show-file', [FileController::class, 'showUploadForm'])->name('files.showUploadForm');

// POST route for handling the form submission
Route::post('/file-upload', [FileController::class, 'upload'])->name('file.upload');


// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login attempt
Route::post('/login', [LoginController::class, 'login']);

// In your routes/web.php file
Route::post('/files/{id}/approve', [FileController::class, 'approve'])->name('file.approve');
Route::post('/files/{id}/disapprove', [FileController::class, 'disapprove'])->name('file.disapprove');

Route::get('/dashboard', [DashboardController::class, 'calculateSdiScore'])->name('dashboard');


Route::post('/indikator-approval', [IndikatorApprovalController::class, 'approve'])->name('indikator.approve');