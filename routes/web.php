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
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home')->middleware('auth');


Route::group(['prefix'=>'admin','as'=>'admin.'],function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/', 'Admin\MainController@index')->name('dashboard');


    Route::group(['prefix'=>'bulten','as'=>'bulten.'],function (){
        Route::get('/', 'Admin\BultenController@index')->name('index');
        Route::get('/create', 'Admin\BultenController@create')->name('create');
        Route::post('/create', 'Admin\BultenController@store')->name('store');
        Route::get('/edit/{bulten}', 'Admin\BultenController@edit')->name('edit');
        Route::post('/update/{bulten}', 'Admin\BultenController@update')->name('update');
        Route::delete('/delete/{bulten}', 'Admin\BultenController@destroy')->name('delete');
    });


}) ;
Route::Group(['prefix'=>'firma','middleware'=>'auth'],function() {
    Route::get('/edit','MusteriController@edit')->name('musteri.edit');
    Route::post('/edit','MusteriController@update')->name('musteri.update');

}) ;
