<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\tanggapanController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Password;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\profileController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controller\Auth\RegisterController;


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

Route::get('/', [LoginController::class, 'default']);

Auth::routes(['verify'=>true]);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('auth');


Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

// Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');    
Route::get('register', [LoginController::class, 'register'])->name('register.index')->middleware('guest');
Route::post('register', [LoginController::class, 'registerLogic'])->name('registerLogic');

//forgot password
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get')->middleware('auth');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get')->middleware('auth');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//indoregion
Route::post('/getdesa', [IndoRegionController::class, 'getDesa'])->name('getdesa');
Route::post('/getkota', [IndoRegionController::class, 'getkota'])->name('getkota');
Route::post('/getkecamatan', [IndoRegionController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('/getkabupaten', [IndoRegionController::class, 'getkabupaten'])->name('getkabupaten'); 

//tanggapan
Route::get('tanggapan', [tanggapanController::class, 'index'])->name('tanggapan.index')->middleware('auth');
Route::get('tanggapan/create/{id}', [tanggapanController::class, 'create'])->name('tanggapan.create')->middleware('auth');
Route::post('tanggapan', [tanggapanController::class, 'store'])->name('tanggapan.store');
Route::get('tanggapan/{id}/edit', [tanggapanController::class, 'edit'])->name('tanggapan.edit')->middleware('auth');
Route::put('tanggapan/{id}', [tanggapanController::class, 'update'])->name('tanggapan.update');
Route::delete('tanggapan/{id}', [tanggapanController::class, 'destroy'])->name('tanggapan.destroy');
Route::get('tanggapan.cetak', [tanggapanController::class, 'cetak'])->name('tanggapan.cetak')->middleware('auth');
Route::get('/tanggapan/search', [tanggapanController::class, 'search'])->name('tanggapan.search')->middleware('auth');


//kategori
Route::get('kategori', [kategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::get('kategori/create', [kategoriController::class, 'create'])->name('kategori.create')->middleware('auth');
Route::post('kategori', [kategoriController::class, 'store'])->name('kategori.store');
Route::get('kategori/{id}/edit', [kategoriController::class, 'edit'])->name('kategori.edit')->middleware('auth');
Route::put('kategori/{id}', [kategoriController::class, 'update'])->name('kategori.update');
Route::delete('kategori/{id}', [kategoriController::class, 'destroy'])->name('kategori.destroy');

//pengaduan
Route::get('pengaduan', [pengaduanController::class, 'index'])->name('pengaduan.index')->middleware('auth');
Route::get('pengaduan/create', [pengaduanController::class, 'create'])->name('pengaduan.create')->middleware('auth');
Route::post('pengaduan', [pengaduanController::class, 'store'])->name('pengaduan.store');
Route::delete('pengaduan/{id}', [pengaduanController::class, 'destroy'])->name('pengaduan.destroy');
Route::get('pengaduan/status/{id}', [pengaduanController::class, 'status'])->middleware('auth');
Route::get('pengaduan/{id}', [pengaduanController::class, 'show'])->name('pengaduan.show')->middleware('auth');

//profile + masyarakat
Route::get('masyarakat', [profileController::class, 'index'])->name('masyarakat.index')->middleware('auth');
Route::get('profile', [profileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('profile', [profileController::class, 'update'])->name('profile.update');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->middleware('auth');
Route::get('/profile/search', [profileController::class, 'search'])->name('profile.search')->middleware('auth');

//petugas
Route::get('petugas', [petugasController::class, 'index'])->name('petugas.index')->middleware('auth');
Route::get('petugas/create', [petugasController::class, 'create'])->name('petugas.create')->middleware('auth');
Route::post('petugas', [petugasController::class, 'store'])->name('petugas.store');
Route::get('petugas/{id}/edit', [petugasController::class, 'edit'])->name('petugas.edit')->middleware('auth');
Route::put('petugas/{id}', [petugasController::class, 'update'])->name('petugas.update');
Route::delete('petugas/{id}', [petugasController::class, 'destroy'])->name('petugas.destroy');





