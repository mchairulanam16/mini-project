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
