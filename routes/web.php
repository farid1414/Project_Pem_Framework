<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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
    return view('/dashboard');
});
Route::get('/form', function () {
    return view('/absen');
});

Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('auth:admin');
Route::get('/admin/daftar_antri_admin', [AdminController::class, 'daftar_antri_admin'])->middleware('auth:admin');
Route::get('/admin/{id}/generate_akun', [AdminController::class, 'generate_akun'])->middleware('auth:admin');
Route::post('/admin/generate_akun', [AdminController::class, 'post_generate'])->name('post_generate')->middleware('auth:admin');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [LoginController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'postregis'])->name('registrasi');

Route::post('/form', [HomeController::class, 'postdaftar'])->name('daftar');