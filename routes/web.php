<?php

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
    return view('guest.index');
});

Route::get('/login', function () {
    return view('admin/login.index');
});

Route::view('/register','guest/register');
Route::view('/qr','guest/qr');
Route::view('/menu','guest/menu');
Route::view('/keranjang','guest/keranjang');

// admin
Route::view('/dashboard','admin/dashboard.index');

Route::view('/masakan','admin/masakan.index');
Route::view('/masakan/tambah','admin/masakan.create')->name('masakan.tambah');
Route::view('/masakan/edit','admin/masakan.edit')->name('masakan.edit');

Route::view('/kategori','admin/kategori.index');
Route::view('/kategori/tambah','admin/kategori.create')->name('kategori.tambah');
Route::view('/kategori/edit','admin/kategori.edit')->name('kategori.edit');

Route::view('/user','admin/user.index');
Route::view('/user/tambah','admin/user.create')->name('user.tambah');
Route::view('/user/edit','admin/user.edit')->name('user.edit');

Route::view('/orderan','admin/orderan.index');
Route::view('/orderan/detail','admin/orderan.detail')->name('orderan.detail');

Route::view('/laporan','admin/laporan.index');

Route::view('/transaksi','admin/transaksi.index');
