<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/program-studi', [ProgramStudiController::class, 'index'])->name('program-studi');
Route::resource('/fakultas', FakultasController::class);
Route::resource('/program-studi', ProgramStudiController::class);

//API
Route::get('/sekolah', [SekolahController::class,'index']);
Route::get('/fetch-sekolah', [SekolahController::class,'fetchSekolah']);