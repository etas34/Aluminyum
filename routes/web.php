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


Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
//cache temizleme
Route::get('/reset', function(){
    Artisan::call('config:cache');

    Artisan::call('cache:clear');

});
Route::get('/', 'HomeController@index')->name('index');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/details/{user}', 'HomeController@details')->name('details');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/news/detay/{bulten}', 'HomeController@newsdetay')->name('newsdetay');
Route::get('/home', 'HomeController@home')->name('home')->middleware('auth');
Route::post('/contact', 'HomeController@contactform')->name('contactform');
Route::post('/schedule', 'HomeController@schedule')->name('schedule');


Route::group(['prefix'=>'admin','as'=>'admin.'],function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::post('logout/', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/', 'Admin\MainController@index')->name('dashboard')->middleware('authAdmin');


    Route::group(['prefix'=>'bulten','as'=>'bulten.','middleware'=>'authAdmin'],function (){
        Route::get('/', 'Admin\BultenController@index')->name('index');
        Route::get('/create', 'Admin\BultenController@create')->name('create');
        Route::post('/create', 'Admin\BultenController@store')->name('store');
        Route::get('/edit/{bulten}', 'Admin\BultenController@edit')->name('edit');
        Route::post('/update/{bulten}', 'Admin\BultenController@update')->name('update');
        Route::get('/delete/{bulten}', 'Admin\BultenController@destroy')->name('destroy');
    });
    Route::group(['prefix'=>'kategori','as'=>'kategori.','middleware'=>'authAdmin'],function (){
        Route::get('/indexUst', 'Admin\KategoriController@indexUst')->name('indexUst');
        Route::get('/indexAlt', 'Admin\KategoriController@indexAlt')->name('indexAlt');
        Route::get('/createUst', 'Admin\KategoriController@createUst')->name('createUst');
        Route::get('/createAlt', 'Admin\KategoriController@createAlt')->name('createAlt');
        Route::get('/editUst/{kategori}', 'Admin\KategoriController@editUst')->name('editUst');
        Route::get('/editAlt/{altkategori}', 'Admin\KategoriController@editAlt')->name('editAlt');
        Route::post('/editUst/{kategori}', 'Admin\KategoriController@updateUst')->name('updateUst');
        Route::post('/editAlt/{altkategori}', 'Admin\KategoriController@updateAlt')->name('updateAlt');
        Route::post('/createUst', 'Admin\KategoriController@storeUst')->name('storeUst');
        Route::post('/createAlt', 'Admin\KategoriController@storeAlt')->name('storeAlt');
        Route::any('/deleteUst/{kategori}', 'Admin\KategoriController@destroyUst')->name('destroyUst');
        Route::any('/deleteAlt/{altkategori}', 'Admin\KategoriController@destroyAlt')->name('destroyAlt');

    });
    Route::group(['prefix'=>'user','as'=>'user.','middleware'=>'authAdmin'],function (){
        Route::get('/', 'Admin\UserController@index')->name('index');
        Route::get('/onaylanmamis', 'Admin\UserController@onaylanmamis')->name('onaylanmamis');
        Route::get('/create', 'Admin\UserController@create')->name('create');
        Route::post('/create', 'Admin\UserController@store')->name('store');
        Route::get('/edit/{user}', 'Admin\UserController@edit')->name('edit');
        Route::get('/onayla/{user}', 'Admin\UserController@onayla')->name('onayla');
        Route::post('/update/{user}', 'Admin\UserController@update')->name('update');
        Route::get('/delete/{user}', 'Admin\UserController@destroy')->name('destroy');
    });

}) ;
Route::Group(['prefix'=>'firma','middleware'=>'auth'],function() {
    Route::get('/edit','MusteriController@edit')->name('musteri.edit');
    Route::post('/edit','MusteriController@update')->name('musteri.update');
}) ;
Route::Group(['prefix'=>'urun','as'=>'urun.','middleware' => ['auth', 'musteriOnay']],function() {
    Route::get('/','UrunController@index')->name('index');
    Route::get('/create','UrunController@create')->name('create');
    Route::get('/edit/{urun}','UrunController@edit')->name('edit');
    Route::post('/create','UrunController@store')->name('store');
    Route::post('/edit/{urun}','UrunController@update')->name('update');
    Route::any('/delete/{urun}','UrunController@destroy')->name('destroy');
}) ;
Route::Group(['prefix'=>'gorusme','as'=>'gorusme.','middleware' => ['auth', 'musteriOnay']],function() {
    Route::get('/','GorusmeController@index')->name('index');
    Route::get('/bekleme/{gorusme}','GorusmeController@bekleme')->name('bekleme');
    Route::get('/kabul/{gorusme}','GorusmeController@kabul')->name('kabul');
    Route::any('/delete/{gorusme}','GorusmeController@destroy')->name('destroy');
}) ;

Route::post('/get', 'Admin\UserController@getUserbyId')->name('getUser');
Route::post('/get2', 'Admin\UserController@getUserbyId2')->name('getUser2');
Route::post('/get3', 'Admin\UserController@getUserbyId3')->name('getUser3');
Route::post('/getAltkategori', 'Admin\KategoriController@getAltkategori')->name('getAltkategori');
