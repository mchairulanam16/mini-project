<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/code', [App\Http\Controllers\CodeController::class, 'index'])->name('code');
Route::get('/generate-code', [App\Http\Controllers\CodeController::class, 'store'])->name('generateCode');

Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
Route::post('/subject-store', [App\Http\Controllers\SubjectController::class, 'store'])->name('subjectStore');
Route::get('/subject/{$id}', [App\Http\Controllers\SubjectController::class, 'show'])->name('subjectDetail');
Route::delete('/subject/{$id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subjectDelete');

Route::get('/class', [App\Http\Controllers\KelasController::class, 'index'])->name('class');
Route::get('/class-create', [App\Http\Controllers\KelasController::class, 'store'])->name('classCreate');
Route::put('/class{$id}', [App\Http\Controllers\KelasController::class, 'update'])->name('classUpdate');
Route::put('/class/delete/{$id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('classDestroy');
