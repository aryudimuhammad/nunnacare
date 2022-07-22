<?php
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\produkController::class, 'welcome'])->name('welcome');
Route::post('/', [App\Http\Controllers\produkController::class, 'welcome'])->name('welcome');
Route::get('/detail/{id}', [App\Http\Controllers\produkController::class, 'detail'])->name('detail');


Route::group(['middleware' => ['auth', 'Checkrole:1,2']], function ()
{
Route::get('/cart/{id}', [App\Http\Controllers\pesananController::class, 'cart'])->name('cart');
Route::post('/cart/{id}', [App\Http\Controllers\pesananController::class, 'cart'])->name('cart');
Route::put('/cart/{id}', [App\Http\Controllers\pesananController::class, 'cartjumlah'])->name('cartjumlah');
Route::delete('/cart/delete/{id}', [App\Http\Controllers\pesananController::class, 'cartdelete'])->name('cartdelete');
Route::get('/pembayaranlist/{id}', [App\Http\Controllers\pesananController::class, 'pembayaranlist'])->name('pembayaranlist');
Route::get('/pembayaran/{id}/{idn}', [App\Http\Controllers\pesananController::class, 'pembayaran'])->name('pembayaran');
Route::get('/pembayaran1/{id}', [App\Http\Controllers\pesananController::class, 'pembayaran1'])->name('pembayaran1');
Route::post('/pembayaran/{id}/{idn}', [App\Http\Controllers\pesananController::class, 'buktipembayaran'])->name('buktipembayaran');
Route::put('/pembayaran/{id}/{idn}', [App\Http\Controllers\pesananController::class, 'diterima'])->name('diterima');

});

Route::group(['middleware' => ['auth', 'Checkrole:1']], function ()
{
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard', [App\Http\Controllers\produkController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/produk', [App\Http\Controllers\produkController::class, 'produk'])->name('produk');
Route::delete('/admin/produk/{id}', [App\Http\Controllers\produkController::class, 'deleteproduk'])->name('deleteproduk');
Route::get('/admin/detailproduk/{id}', [App\Http\Controllers\produkController::class, 'detailproduk'])->name('detailproduk');
Route::post('/admin/produk', [App\Http\Controllers\produkController::class, 'tambahproduk'])->name('tambahproduk');
Route::put('/admin/produk', [App2\Http\Controllers\produkController::class, 'editproduk'])->name('editproduk');
Route::get('/admin/produk/cetak', [App\Http\Controllers\cetakController::class, 'cetakproduk'])->name('cetakproduk');


Route::get('/admin/user', [App\Http\Controllers\userController::class, 'user'])->name('user');
Route::post('/admin/user', [App\Http\Controllers\userController::class, 'useredit'])->name('useredit');
Route::put('/admin/user}', [App\Http\Controllers\userController::class, 'usertambah'])->name('usertambah');
Route::delete('/admin/user/{id}', [App\Http\Controllers\userController::class, 'userdelete'])->name('userdelete');
Route::get('/admin/user/cetak', [App\Http\Controllers\cetakController::class, 'usercetak'])->name('usercetak');
Route::get('/admin/user/cetaksatuan/{id}', [App\Http\Controllers\cetakController::class, 'usercetak1'])->name('usercetak1');


Route::get('/admin/supplier', [App\Http\Controllers\supplierController::class, 'supplier'])->name('supplier');
Route::post('/admin/supplier', [App\Http\Controllers\supplierController::class, 'tambahsupplier'])->name('tambahsupplier');
Route::delete('/admin/supplier/{id}', [App\Http\Controllers\supplierController::class, 'deletesupplier'])->name('deletesupplier');
Route::get('/edit/supplier/{id}', [App\Http\Controllers\supplierController::class, 'editsupplier'])->name('editsupplier');
Route::post('/edit/supplier/{id}', [App\Http\Controllers\supplierController::class, 'aksieditsupplier'])->name('aksieditsupplier');
Route::get('/detail/supplier/{id}', [App\Http\Controllers\supplierController::class, 'detailsupplier'])->name('detailsupplier');
Route::post('/detail/supplier/{id}', [App\Http\Controllers\supplierController::class, 'refundsupplier'])->name('refundsupplier');
Route::get('/admin/supplier/cetak', [App\Http\Controllers\cetakController::class, 'cetaksupplier'])->name('cetaksupplier');
Route::get('/admin/supplier/cetak1/{id}', [App\Http\Controllers\cetakController::class, 'cetaksupplier1'])->name('cetaksupplier1');


Route::get('/admin/pesanan', [App\Http\Controllers\pesananController::class, 'adminpesanan'])->name('adminpesanan');
Route::post('/admin/pesanan/ongkir', [App\Http\Controllers\pesananController::class, 'ongkiradminpesanan'])->name('ongkiradminpesanan');
Route::post('/admin/pesanan', [App\Http\Controllers\pesananController::class, 'estimasiadminpesanan'])->name('estimasiadminpesanan');
Route::delete('/admin/pesanan/delete/{id}', [App\Http\Controllers\pesananController::class, 'adminpesanandelete'])->name('adminpesanandelete');
Route::get('/admin/pesanan/detail/{id}/{idu}', [App\Http\Controllers\pesananController::class, 'adminpesanandetail'])->name('adminpesanandetail');
Route::get('/admin/pesanan/cetakkiriman', [App\Http\Controllers\cetakController::class, 'cetakpesanankiriman'])->name('cetakpesanankiriman');
Route::get('/admin/pesanan/cetakkirimanditerima', [App\Http\Controllers\cetakController::class, 'cetakpesananditerima'])->name('cetakpesananditerima');
Route::get('/admin/pesanan/cetakbaranglaris', [App\Http\Controllers\cetakController::class, 'cetakbaranglaris'])->name('cetakbaranglaris');
Route::get('/admin/pesanan/cetakbarangtidaklaris', [App\Http\Controllers\cetakController::class, 'cetakbarangtidaklaris'])->name('cetakbarangtidaklaris');
Route::get('/admin/pesanan/cetakbarangtransaksi', [App\Http\Controllers\cetakController::class, 'cetakbarangtransaksi'])->name('cetakbarangtransaksi');
Route::get('/admin/pesanan/cetakcart/{id}/{idu}', [App\Http\Controllers\cetakController::class, 'cetakcart'])->name('cetakcart');
Route::get('/admin/pesanan/cetakkeuangan', [App\Http\Controllers\cetakController::class, 'cetakkeuangan'])->name('cetakkeuangan');
});


Route::get('/cetak/nota', [App\Http\Controllers\CetakController::class, 'nota'])->name('nota');
