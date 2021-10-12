<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create someth ing great!
|
*/
Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

Route::get('/form', function () {
    return view('/absen');
});
Route::get('/film', function () {
    return view('/tiket_film');
});   
Route::get('/konser', function () {
    return view('/tiket_konser');
}); 
Route::get('/webinar', function () {
    return view('/webinar');
}); 
Route::get('/workshop', function () {
    return view('/workshop');
});       
Route::get('/f', function () {
    return view('/admin/form');
});

Route::Group(['middleware' => ['auth:admin']], function () {
    
});

Route::Group(['middleware' => ['Admin']], function () {
    Route::get('/admin/daftar-antri-event', [AdminController::class, 'daftarEvent']);
    Route::get('/admin/daftar-antri-admin', [AdminController::class, 'daftarAdmin']);
    Route::get('/admin/{id}/generate_akun', [AdminController::class, 'generate_akun']);
    Route::get('/admin/{id}/detail-event', [AdminController::class, 'detailEvent']);
    Route::post('/admin/{id}/detail-event', [AdminController::class, 'postEvent']);
    Route::post('/admin/{id}/generate_akun', [AdminController::class, 'post_generate'])->name('post_generate');
});



Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [LoginController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'postregis'])->name('registrasi')->middleware('guest');
Route::post('/form', [HomeController::class, 'postdaftar'])->name('daftar');
Route::get('/reload', [LoginController::class, 'reload']);

Route::Group(['middleware' => ['auth:web']], function () {
    Route::get('/{id}/ubahpassword', [LoginController::class, 'ubahPassword']);
    Route::post('/{id}/postpassword', [LoginController::class, 'postPassword'])->name('postpassword');
    Route::get('/{id}/profil', [UserController::class, 'showProfil']);
    Route::post('/{id}/profil', [UserController::class, 'postProfil']);
    Route::get('/form-event', function () {
        return view('/form_event');
    });
    Route::post('/form-event', [UserController::class, 'postEvent'])->name('postEvent');
    Route::get('/tabel-pengajuan', [UserController::class, 'showPengajuan'])->name('pengajuan');
    Route::get('/edit-event/{id}', [UserController::class, 'showEvent']);
    Route::put('/edit-event/{id}', [UserController::class, 'editEvent']);
});