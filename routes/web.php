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
    return view('admin.login.index');
});
//waiter

//pelanggan
Route::view('/register','guest/register');
Route::view('/qr','guest/qr');
Route::view('/menu','guest/menu');
Route::view('/keranjang','guest/keranjang');
//end-pelanggan

// admin
Route::get('admin/', 'AdminLoginController@getLogin')->middleware('guest');
Route::get('admin/login', 'AdminLoginController@getLogin')->middleware('guest')->name('admin.login');
Route::post('admin/login', 'AdminLoginController@postLogin');
Route::get('admin/logout', 'AdminLoginController@Logout')->name('admin.logout');
//
Route::group(['prefix' => 'admin','middleware' => ['auth:admin']], function() {
    //---DASHBOARD---//
    Route::get('/dashboard','AdminDashboardController@index')->name('admin.dashboard');
    //---MASAKAN---//
    Route::resource('masakan','MasakanController');
    Route::post('admin/masakan/updatestatus/{masakan}','MasakanController@UpdateStatus')->name('masakan.updateStatus');
    //---MEJA---///
    Route::resource('meja','MejaController');
    //---TRANSAKSI---//
    Route::get('/transaksi','AdminTransaksiController@order')->name('admin.transaksi');
    Route::post('/transaksi/kodeorder','AdminTransaksiController@CariKodeOrder')->name('admintransaksi.carikode');
    Route::post('/transaksi/bayar','AdminTransaksiController@Bayar')->name('admintransaksi.bayar');
    Route::post('/transaksi/bayar/report','AdminTransaksiController@CetakStruk')->name('admintransaksi.bayar.report');
    //---LAPORAN---//
    Route::view('/laporan','admin/laporan.index');
    //------------------------------ ACCOUNT USER ------------------------------//
    //---ADMIN-ACCOUNT---//
    Route::resource('adminaccount','AdminController');
    Route::resource('pelangganaccount','PelangganController');
});
//end-admin