<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
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

Route::get('/', fn () =>redirect()->route('login'));


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified']) -> group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    }) -> name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('/kategori', KategoriController::class);

    Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data'); // menampilkan data ajax (data tabel tapi ajax)
    Route::resource('/produk', ProdukController::class); //menampilkan index & show & store & delete & update
    Route::post('/produk/deleted-terpilih', [ProdukController::class, 'deleteterpilih'])->name('produk.deleteterpilih'); // menghapus data terpilih
    Route::post('/produk/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('produk.cetak_barcode'); // menghapus data terpilih

});