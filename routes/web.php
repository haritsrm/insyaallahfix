<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{filter}', 'HomeController@indexcat')->name('homecat');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/barang/{id}', 'Barang\BarangController@detail')->name('product');


Route::get('/admina/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::group(['prefix' => 'admina', 'middleware' => 'auth:admin'], function()
{
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.home');

    //Home Controller
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/newadmin', 'Admin\AdminController@new')->name('admin/new');
    Route::post('/addadmin', 'Admin\AdminController@create')->name('admin/create');
    Route::get('/showadmin', 'Admin\AdminController@show')->name('admin/show');
    Route::post('/adminsus/{id}', 'Admin\AdminController@suspend')->name('admin/suspend');
    Route::post('/adminact/{id}', 'Admin\AdminController@activate')->name('admin/activate');
    //Barang Controller
    Route::get('/showbarang', 'Admin\BarangController@show')->name('admin/showbarang');
    Route::get('/showruangan', 'Admin\BarangController@show')->name('admin/showruangan');
    Route::get('/newbarang', 'Admin\BarangController@new')->name('admin/newbarang');
    Route::post('/addbarang', 'Admin\BarangController@create')->name('barang/create');
    Route::post('/updatebarang/{id}', 'Admin\BarangController@update')->name('barang/update');
    Route::delete('/deletebarang/{id}', 'Admin\BarangController@delete')->name('barang/delete');
    Route::get('/newruangan', 'Admin\BarangController@new')->name('admin/newruangan');
    //User Controller
    Route::get('/showuser', 'Admin\UserController@show')->name('admin/showuser');
    Route::post('/usersus/{id}', 'Admin\UserController@suspend')->name('admin/usersus');
    Route::post('/useract/{id}', 'Admin\UserController@activate')->name('admin/activateuser');
    //Peminjaman Controller
    Route::get('/peminjaman', 'Admin\PeminjamanController@show')->name('admin/showpeminjaman');
    Route::get('/verifikasipeminjaman', 'Admin\PeminjamanController@show')->name('admin/verifpeminjaman');
    Route::post('/acc/{id}', 'Admin\PeminjamanController@acc');
    Route::post('/terima/{id}', 'Admin\PeminjamanController@terima');
    Route::post('/block/{id}', 'Admin\PeminjamanController@block');
    Route::get('/pengembalian', 'Admin\PengembalianController@show')->name('admin/pengembalian');
    Route::post('/kembali/{id}', 'Admin\PengembalianController@kembali');
    //email
    // Route::get('/mail', 'MailController@send');
    //setting akun
    Route::get('/setting', 'Admin\SettingController@index');
    Route::post('/settingpost', 'Admin\SettingController@changePassword');
    Route::post('/changeprofile', 'Admin\SettingController@changeProfile');
    //profile
    Route::get('/profile', function(){
        return view('layouts.profile');
    });

    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/logs', function(){
        $data = \App\Log::latest()->get();
        return view('admin.showlog')->with('val', $data);
    });
    //laporan
    Route::get('/laporan', 'Admin\LaporanController@index')->name('admin.laporan');
    Route::get('/laporanbarang', 'Admin\LaporanController@barang')->name('admin.laporanbarang');

    Route::post('/printlaporan', 'Admin\LaporanController@print')->name('admin.printlaporan');
    Route::get('/printlaporan', 'Admin\LaporanController@println')->name('admin.printlap');

    Route::post('/printlaporanbarang', 'Admin\LaporanController@printbarang')->name('admin.printlaporanbarang');
    Route::get('/printlaporanbarang', 'Admin\LaporanController@printlnbarang')->name('admin.printlapbarang');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/carts', 'Cart\CartController@index')->name('carts');
    Route::post('/cart', 'Cart\CartController@create')->name('cart.create');
    Route::put('/cart', 'Cart\CartController@update')->name('cart.update');
    Route::delete('/cart/{id}', 'Cart\CartController@delete')->name('cart.delete');
    Route::post('/buy now', 'Cart\CartController@buyNow')->name('cart.buyNow');
    Route::get('/verifikasi', 'User\PeminjamanController@verifikasi')->name('verifikasi');
    Route::post('/pinjam', 'User\PeminjamanController@pinjam')->name('pinjam');
    Route::get('/pinjamanku', 'User\PeminjamanController@pinjamanku')->name('pinjamanku');
    Route::get('/pdf/{id}', 'User\PdfController@print');
    // Route::get('/pdf/{id}', function($id){
    //     return view('pdf.peminjaman')->with('id', $id);
    // });
    //setting akun
    Route::get('/setting', 'User\SettingController@index');
    Route::post('/settingpost', 'User\SettingController@changePassword');
    Route::post('/changeprofile', 'User\SettingController@changeProfile');
    //profile
    Route::get('/profile', function(){
        return view('layouts.profile');
    });
});

Route::get('/laporan/{id]', function($id){
    return view('pdf.peminjaman')->with('id', $id);
});