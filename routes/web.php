<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NomorSeriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::get('/barang', [BarangController::class, 'barangall'])->name('barang');
	Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
	Route::post('/barang/create', [BarangController::class, 'store'])->name('barang.store');
	Route::get('barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
	Route::put('barang/edit/{id}', [BarangController::class, 'update'])->name('barang.update');
	Route::delete('barang/edit/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
	Route::resource('nomor-seri', NomorSeriController::class);
	Route::get('/transaksi', [TransaksiController::class, 'transaksiall'])->name('transaksi');
	Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
	Route::post('/transaksi/create', [TransaksiController::class, 'store'])->name('transaksi.store');
	Route::get('/transaksi/edeit/{id]', [TransaksiController::class, 'edit'])->name('transaksi.edit');
	Route::resource('detail-transaksi', DetailTransaksiController::class);
	Route::get('/laporan', [LaporanController::class, 'show'])->name('laporan');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
});