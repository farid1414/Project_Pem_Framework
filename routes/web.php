<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::get('/admin', function () {
    return view('/admin/dashboard_admin');
});
Route::get('/admin/tabel', function () {
    return view('/admin/tabel');
});
Route::get('/admin/form', function () {
    return view('/admin/form');
});
Route::get('/login', function () {
    return view('/login');
});

Route::post('/login', [LoginController::class, 'postlogin'])->name('login');