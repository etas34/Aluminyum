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
//cache temizleme
Route::get('/reset', function(){
    Artisan::call('config:cache');

    Artisan::call('cache:clear');

});
Route::get('/deneme', 'HomeController@deneme');


Route::get('/', 'HomeController@index')->name('index');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/details/{user}', 'HomeController@details')->name('details');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/news/detay/{bulten}', 'HomeController@newsdetay')->name('newsdetay');
Route::get('/howitworks', 'HomeController@howitworks')->name('howitworks');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
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
    Route::group(['prefix'=>'faq','as'=>'faq.','middleware'=>'authAdmin'],function (){
        Route::get('/', 'Admin\FaqController@index')->name('index');
        Route::get('/create', 'Admin\FaqController@create')->name('create');
        Route::post('/create', 'Admin\FaqController@store')->name('store');
        Route::get('/edit/{faq}', 'Admin\FaqController@edit')->name('edit');
        Route::post('/update/{faq}', 'Admin\FaqController@update')->name('update');
        Route::get('/delete/{faq}', 'Admin\FaqController@destroy')->name('destroy');
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
    Route::Group(['prefix'=>'gorusme','as'=>'gorusme.','middleware' => 'authAdmin'],function() {
        Route::get('/','Admin\MainController@gorusme')->name('index');
        Route::get('/gorusmebekle','Admin\MainController@gorusmebekle')->name('gorusmebekle');
        Route::get('/gorusmekabul','Admin\MainController@gorusmekabul')->name('gorusmekabul');
    }) ;
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
    Route::group(['prefix'=>'adminurun','as'=>'adminurun.','middleware'=>'authAdmin'],function (){
        Route::get('/', 'Admin\AdminUrunController@index')->name('index');
        Route::get('/edit/{urun}', 'Admin\AdminUrunController@edit')->name('edit');
        Route::post('/update/{urun}', 'Admin\AdminUrunController@update')->name('update');
        Route::get('/delete/{urun}', 'Admin\AdminUrunController@destroy')->name('destroy');
    });
    Route::Group(['prefix'=>'about','as'=>'about.','middleware'=>'authAdmin'],function() {
        Route::get('/edit','Admin\AboutController@edit')->name('edit');
        Route::post('/edit','Admin\AboutController@update')->name('update');
    }) ;
    Route::Group(['prefix'=>'privacy','as'=>'privacy.','middleware'=>'authAdmin'],function() {
        Route::get('/edit','Admin\PrivacyController@edit')->name('edit');
        Route::post('/edit','Admin\PrivacyController@update')->name('update');
    }) ;
    Route::Group(['prefix'=>'howitworks','as'=>'howitworks.','middleware'=>'authAdmin'],function() {
        Route::get('/edit','Admin\HowitworksController@edit')->name('edit');
        Route::post('/edit','Admin\HowitworksController@update')->name('update');
    }) ;

}) ;
Route::Group(['prefix'=>'firma','middleware'=>'auth'],function() {
    Route::get('/panel-kullanim','MusteriController@index')->name('kullanim.index');
    Route::get('/edit','MusteriController@edit')->name('musteri.edit');
    Route::post('/edit','MusteriController@update')->name('musteri.update');
    Route::post('/sifre','MusteriController@sifre')->name('musteri.sifre');
}) ;
Route::Group(['prefix'=>'urun','as'=>'urun.','middleware' => ['auth']],function() {
    Route::get('/','UrunController@index')->name('index');
    Route::get('/create','UrunController@create')->name('create');
    Route::get('/edit/{urun}','UrunController@edit')->name('edit');
    Route::post('/create','UrunController@store')->name('store');
    Route::post('/edit/{urun}','UrunController@update')->name('update');
    Route::any('/delete/{urun}','UrunController@destroy')->name('destroy');
}) ;
Route::Group(['prefix'=>'gorusme','as'=>'gorusme.','middleware' => ['auth']],function() {
    Route::get('/','GorusmeController@index')->name('index');
    Route::get('/kabul/{gorusme}','GorusmeController@kabul')->name('kabul');
    Route::post('/bekleme','GorusmeController@bekleme')->name('bekleme');
    Route::any('/delete/{gorusme}','GorusmeController@destroy')->name('destroy');
    Route::post('/revize','GorusmeController@revize')->name('revize');
}) ;

Route::get('/filtre', 'HomeController@index');
Route::post('/filtre', 'Admin\UserController@getFirma')->name('getFirma');
Route::post('/get3', 'Admin\UserController@getUserbyId3')->name('getUser3');
