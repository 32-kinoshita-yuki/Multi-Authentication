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



    //admin ログイン前
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
    
    Route::group(['prefix' => 'admin'], function() {
    Route::get('/profile', 'Influ\Auth\ProfileController@showList')->name('profiles');           //profile一覧を表示
    Route::get('/profile/{id}', 'Influ\Auth\ProfileController@showDetail')->name('show');     //profile詳細を表示
    Route::get('/profile/create', 'Influ\Auth\ProfileController@showCreate')->name('profilecreate');    //profile登録を表示
    Route::post('/profile/store', 'Influ\Auth\ProfileController@exeStore')->name('store');       //profileを登録する
    });
    
     //admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    });



    //influ　ログイン前
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
    
Route::group(['prefix' => 'influ'], function() {
    Route::get('/blog', 'Influ\Auth\BlogController@showList')->name('blogs');           //blog一覧を表示
    
    Route::get('/blog/create', 'Influ\Auth\BlogController@showCreate')->name('create'); //blog登録画面を表示
    Route::post('/blog/store', 'Influ\Auth\BlogController@exeStore')->name('store');    //blogの登録
    Route::get('/blog/edit/{id}', 'Influ\Auth\BlogController@showEdit')->name('edit');  //blog編集を表示
    Route::post('/blog/update', 'Influ\Auth\BlogController@exeUpdate')->name('update'); //blog編集
    Route::post('/blog/delete/{id}', 'Influ\Auth\BlogController@exeDelete')->name('delete');  //blog削除
    Route::get('/blog/{id}', 'Influ\Auth\BlogController@showDetail')->name('show');     //blog詳細を表示
    
    Route::get('/profile', 'Influ\Auth\ProfileController@showList')->name('profiles');           //profile一覧を表示
    
    Route::get('/profile/create', 'Influ\Auth\ProfileController@showCreate')->name('profilecreate'); //profile登録を表示
    Route::post('/profile/store', 'Influ\Auth\ProfileController@exeStore')->name('profilestore');           //profileを登録する
    Route::get('/profile/edit/{id}', 'Influ\Auth\ProfileController@showEdit')->name('profileedit');         //profile編集を表示
    Route::post('/profile/update', 'Influ\Auth\ProfileController@exeUpdate')->name('profileupdate'); //profile編集
    Route::post('/profile/delete/{id}', 'Influ\Auth\ProfileController@exeDelete')->name('profiledelete'); //profile削除
    Route::get('/profile/{id}', 'Influ\Auth\ProfileController@showDetail')->name('showprofile');          //profile詳細を表示
    });
    
    //influ　ログイン後
Route::group(['prefix' => 'influ', 'middleware' => 'auth:influ'], function(){
    Route::post('logout', 'Influ\Auth\LoginController@logout')->name('influ.logout');
    Route::get('home', 'Influ\HomeController@index')->name('influ.home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
     
    

 