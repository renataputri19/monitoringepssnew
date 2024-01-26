<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/epss', function () {
    return view('epss');
});

// Add this line to define the /sdi route
Route::get('/sdi', function () {
    return view('sdi');
});

// GET route for displaying the form
Route::get('/file-upload', [FileController::class, 'showUploadForm'])->name('files.showUploadForm');

// POST route for handling the form submission
Route::post('/file-upload', [FileController::class, 'upload'])->name('file.upload');