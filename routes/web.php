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


Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function() {
    Route::get('/', function () {
        return view('admin.welcome');
    });
    
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');

    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');

    Route::get('password/rest', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');


});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});



Route::group(['prefix' => 'influ', 'middleware' => 'guest:influ'], function() {
    Route::get('/', function () {
        return view('influ.welcome');
    });
    
    Route::get('login', 'Influ\Auth\LoginController@showLoginForm')->name('influ.login');

    Route::get('login', 'Influ\Auth\LoginController@showLoginForm')->name('influ.login');
    Route::post('login', 'Influ\Auth\LoginController@login')->name('influ.login');

    Route::get('register', 'Influ\Auth\RegisterController@showRegisterForm')->name('influ.register');
    Route::post('register', 'Influ\Auth\RegisterController@register')->name('influ.register');

    Route::get('password/rest', 'Influ\Auth\ForgotPasswordController@showLinkRequestForm')->name('influ.password.request');


});

Route::group(['prefix' => 'influ', 'middleware' => 'auth:influ'], function(){
    Route::post('logout', 'Influ\Auth\LoginController@logout')->name('influ.logout');
    Route::get('home', 'Influ\HomeController@index')->name('influ.home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
