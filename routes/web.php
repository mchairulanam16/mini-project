<?php

use Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Code
Route::get('/code', [App\Http\Controllers\CodeController::class, 'index'])->name('code');
Route::get('/generate-code', [App\Http\Controllers\CodeController::class, 'store'])->name('generateCode');
//Kelas
Route::get('/class', [App\Http\Controllers\KelasController::class, 'index'])->name('class');
//Absen
Route::post('/absence', [App\Http\Controllers\AbsenceController::class, 'index'])->name('checkin');
//Subject
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
