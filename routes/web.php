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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'categori'], function(){
    route::get('/','CategorisController@index')->name('categori');
    route::get('/ambil-form','CategorisController@create')->name('categori.ambil-form');
    route::post('/store','CategorisController@store')->name('categori.store');
    route::get('/show-all/{category}','CategorisController@show')->name('producks.show-all');
    route::get('/edit/{category}','CategorisController@edit')->name('categori.edit');
    route::put('/update/{category}','CategorisController@update')->name('categori.update');
    route::delete('/destroy/{category}','CategorisController@destroy')->name('categori.destroy');
});

Route::group(['prefix' => 'produk'], function(){
    route::get('/','ProdukController@index')->name('produk');
    route::get('/ambil-form','ProdukController@create')->name('produk.ambil-form');
    route::post('/store','ProdukController@store')->name('produk.store');
    route::get('/edit/{produck}','ProdukController@edit')->name('produk.edit');
    route::put('/update/{produck}','ProdukController@update')->name('produk.update');
    route::delete('/destroy/{produck}','ProdukController@destroy')->name('produk.destroy');
});

Route::group(['prefix' => 'pembelian'], function(){
    route::get('/','PembelianController@index')->name('pembelian');
});

Route::group(['prefix' => 'cart'], function(){
    route::get('/', 'CartController@index')->name('cart');
    route::post('/add-item', 'CartController@addToCart')->name('cart.add-item');
    route::get('/show', 'CartController@listcart')->name('cart.show');
    route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
    route::post('/proses', 'CartController@prosesCheckout')->name('cart.proses');
    route::get('/selesai/{invoice}', 'CartController@checkoutSelesai')->name('cart.selesai');
});

Route::group(['prefix' => 'producks'], function(){
    route::get('/','Produck\ProduckController@index')->name('producks');
    route::get('/show/{produck}','Produck\ProduckController@show')->name('producks.show');
});

Route::group(['prefix' => 'invite'], function(){
    route::get('','InviteController@index')->name('invite');
    route::get('create','InviteController@create')->name('invite.create');
    route::post('store','InviteController@store')->name('invite.store');
    route::get('edit/{user}','InviteController@edit')->name('invite.edit');
    route::patch('update/{user}','InviteController@update')->name('invite.update');
    route::delete('destroy/{user}','InviteController@destroy')->name('invite.destroy');
});