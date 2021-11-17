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
Route::get('/tiket', [HomeController::class, 'viewTIket']);
Route::get('/categori/{id}', [HomeController::class, 'viewCategori']);

// Route::get('/form', function () {
//     return view('/absen');
// });
// Route::get('/f', function () {
//     return view('/admin/form');
// });


Route::Group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/admin/{id}/edit-password', [AdminController::class, 'passAdmin']);
    Route::post('/admin/{id}/edit-password', [AdminController::class, 'posPass']);
    Route::get('/admin/tiket/{id}', [AdminController::class, 'lihatTiket']);
});

Route::Group(['middleware' => ['Perusahaan']], function () {
    Route::get('/admin/daftar-tiket', [AdminController::class, 'daftarTiket']);
    Route::post('/admin/daftar-tiket', [AdminController::class, 'postTiket'])->name('postTiket');
    Route::get('/admin/penjualan-tiket/{tiket:judul}', [AdminController::class, 'dataJual']);
    Route::get('/admin/{id}/buat-kode', [AdminController::class, 'code']);
    Route::post('/admin/{id}/buat-kode', [AdminController::class, 'buatCode']);
    Route::post('/admin/post-link', [AdminController::class, 'postLink'])->name('postLink');
});

Route::Group(['middleware' => ['Admin']], function () {
    Route::get('/admin/daftar-antri-event', [AdminController::class, 'daftarEvent']);
    Route::get('/admin/daftar-antri-admin', [AdminController::class, 'daftarAdmin']);
    Route::get('/admin/{id}/generate_akun', [AdminController::class, 'generate_akun']);
    Route::get('/admin/{id}/detail-event', [AdminController::class, 'detailEvent']);
    Route::post('/admin/{id}/detail-event', [AdminController::class, 'postEvent']);
    Route::post('/admin/{id}/generate_akun', [AdminController::class, 'post_generate'])->name('post_generate');
    Route::get('/admin/daftar-admin-perusahaan', [AdminController::class, 'daftarPerusahaan']);
});



Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [LoginController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'postregis'])->name('registrasi')->middleware('guest');
Route::get('/form', function () {
    return view('/absen');
});
Route::post('/form', [HomeController::class, 'postdaftar'])->name('daftar');
Route::get('/reload', [LoginController::class, 'reload']);

Route::Group(['middleware' => ['auth:web']], function () {
    Route::get('/ubahpassword/{id}', [LoginController::class, 'ubahPassword'])->name('show_password');
    Route::post('/{id}/postpassword', [LoginController::class, 'postPassword'])->name('postpassword');
    Route::get('/profil/{id}', [UserController::class, 'showProfil'])->name('show_edit');
    Route::post('/{id}/profil', [UserController::class, 'postProfil']);
    Route::get('/form-event', function () {
        return view('/form_event');
    });
    Route::post('/form-event', [UserController::class, 'postEvent'])->name('postEvent');
    Route::get('/tabel-pengajuan', [UserController::class, 'showPengajuan'])->name('pengajuan');
    Route::delete('/tabel-pengajuan/{DaftarEvent:id}', [UserController::class, 'hapusEvent']);
    Route::get('/edit-event/{id}', [UserController::class, 'showEvent']);
    Route::put('/edit-event/{id}', [UserController::class, 'editEvent']);
    Route::post('/beli-tiket', [UserController::class, 'beliTiket']);
    Route::post('/akses-event', [UserController::class, 'aksesEvent']);
    Route::get('/tiket-saya/{id}', [UserController::class, 'tiketSaya'])->name('tiket_saya');
    Route::get('/live-stream/{id}', [UserController::class, 'liveStream'])->name('live_stream');

    Route::view('chat','user/messages');
});