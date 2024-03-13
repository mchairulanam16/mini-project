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
    return redirect()->route('home');
});

Auth::routes();
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/user/add', [App\Http\Controllers\UserController::class, 'store'])->name('user.add');
Route::post('/user/update/', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
//Code
Route::get('/code', [App\Http\Controllers\CodeController::class, 'index'])->name('code');
Route::get('/generate-code', [App\Http\Controllers\CodeController::class, 'store'])->name('generateCode');
//Kelas
Route::get('/class', [App\Http\Controllers\KelasController::class, 'index'])->name('class');
Route::get('/class/{id}', [App\Http\Controllers\KelasController::class, 'show'])->name('class.show');
Route::post('/class/add',  [App\Http\Controllers\KelasController::class, 'store'])->name('class.add');
Route::delete('class/delete/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('class.delete');
Route::post('class/update/', [App\Http\Controllers\KelasController::class, 'destroy'])->name('class.update');
//Absen
Route::post('/absence', [App\Http\Controllers\AbsenceController::class, 'store'])->name('checkin');
Route::post('/absence/out', [App\Http\Controllers\AbsenceController::class, 'update'])->name('checkout');
Route::get('/absence/history', [App\Http\Controllers\AbsenceController::class, 'show'])->name('absence.history');
Route::get('/absence/report', [App\Http\Controllers\AbsenceController::class, 'index'])->name('absence.report');
//Subject
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
Route::post('/subject/add', [App\Http\Controllers\SubjectController::class, 'store'])->name('subject.add');
