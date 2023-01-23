<?php

use App\Http\Controllers\AlgoritmaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('produk', ProdukController::class)->middleware('auth');

Route::get('transaksi/import', [TransaksiController::class, 'viewImport'])->name('transaksi.import.index')->middleware('auth');
Route::post('transaksi/import', [TransaksiController::class, 'import'])->name('transaksi.import.store')->middleware('auth');
Route::resource('transaksi', TransaksiController::class)->middleware('auth');

Route::resource('akun', UserController::class)->middleware('auth');
Route::resource('cart', CartController::class)->middleware('auth')->except('edit', 'show');
Route::prefix('algoritma')->name('algoritma.')->group(function () {
    Route::get('apriori', [AlgoritmaController::class, 'apriori'])->name('apriori')->middleware('auth');
});
