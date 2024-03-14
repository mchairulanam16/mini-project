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
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('super');
Route::post('/user/add', [App\Http\Controllers\UserController::class, 'store'])->name('user.add')->middleware('super');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('super');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete')->middleware('super');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show')->middleware('super');
//Code
Route::get('/code', [App\Http\Controllers\CodeController::class, 'index'])->name('code');
Route::get('/generate-code', [App\Http\Controllers\CodeController::class, 'store'])->name('generateCode')->middleware('cancode');
//Kelas
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('class')->middleware('super');
Route::get('/kelas/{id}', [App\Http\Controllers\KelasController::class, 'show'])->name('class.show')->middleware('super');
Route::post('/kelas/add',  [App\Http\Controllers\KelasController::class, 'store'])->name('class.add')->middleware('super');
Route::delete('/kelas/delete/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('class.delete')->middleware('super');
Route::post('/kelas/update/{id}', [App\Http\Controllers\KelasController::class, 'update'])->name('class.update')->middleware('super');
//Subject
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject')->middleware('super');
Route::post('/subject/add', [App\Http\Controllers\SubjectController::class, 'store'])->name('subject.add')->middleware('super');
Route::get('/subject/{id}', [App\Http\Controllers\SubjectController::class, 'show'])->name('subject.show')->middleware('super');
Route::post('/subject/update/{id}', [App\Http\Controllers\SubjectController::class, 'update'])->name('subject.update')->middleware('super');
Route::delete('/subject/delete/{id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subject.delete')->middleware('super');
//Absen
Route::post('/in', [App\Http\Controllers\AbsenceController::class, 'store'])->name('checkin');
Route::post('/out', [App\Http\Controllers\AbsenceController::class, 'update'])->name('checkout');
Route::get('/absence/history', [App\Http\Controllers\AbsenceController::class, 'show'])->name('absence.history');
Route::get('/absence/report', [App\Http\Controllers\AbsenceController::class, 'index'])->name('absence.report')->middleware('super');
Route::get('/absence/export/', [App\Http\Controllers\AbsenceController::class, 'export'])->name('export')->middleware('super');
