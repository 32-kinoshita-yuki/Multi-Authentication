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
    Route::get('/profile', 'Admin\ProfileController@showList')->name('adminprofiles');             //PR希望会社一覧画面表示
    
    Route::get('/profile/create', 'Admin\ProfileController@showCreate')->name('admincreate');      //PR希望会社登録画面を表示
    Route::post('/profile/store', 'Admin\ProfileController@exeStore')->name('adminstore');         //PR希望会社を登録する
    Route::get('/blog/edit/{id}', 'Admin\ProfileController@showEdit')->name('adminprofileedit');   //PR希望会社編集画面を表示
    Route::post('/blog/update', 'Admin\ProfileController@exeUpdate')->name('adminprofileupdate');  //PR希望会社編集
    Route::post('/profile/delete/{id}', 'Admin\ProfileController@exeDelete')->name('admindelete'); //PR希望会社削除
    Route::get('/profile/{id}', 'Admin\ProfileController@showDetail')->name('adminshow');          //PR希望会社詳細を表示
    
    
    });
    
     //admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::get('home', 'Admin\InfluController@showList')->name('profiles');                       //インフルエンサー一覧

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
    Route::get('/blog', 'Influ\BlogController@showList')->name('blogs');                 //blog一覧画面を表示
    
    Route::get('/blog/create', 'Influ\BlogController@showCreate')->name('create');       //blog登録画面を表示
    Route::post('/blog/store', 'Influ\BlogController@exeStore')->name('store');          //blogを登録する
    Route::get('/blog/edit/{id}', 'Influ\BlogController@showEdit')->name('edit');        //blog編集画面を表示
    Route::post('/blog/update', 'Influ\BlogController@exeUpdate')->name('update');       //blog編集
    Route::post('/blog/delete/{id}', 'Influ\BlogController@exeDelete')->name('delete');  //blog削除
    Route::get('/blog/{id}', 'Influ\BlogController@showDetail')->name('show');           //blog詳細を表示
    
    Route::get('/profile', 'Influ\ProfileController@showList')->name('profiles');                    //profile一覧画面を表示
    
    Route::get('/profile/create', 'Influ\ProfileController@showCreate')->name('profilecreate');      //profile登録画面を表示
    Route::post('/profile/store', 'Influ\ProfileController@exeStore')->name('profilestore');         //profileを登録する
    Route::get('/profile/edit/{id}', 'Influ\ProfileController@showEdit')->name('profileedit');       //profile編集画面を表示
    Route::post('/profile/update', 'Influ\ProfileController@exeUpdate')->name('profileupdate');      //profile編集
    Route::post('/profile/delete/{id}', 'Influ\ProfileController@exeDelete')->name('profiledelete'); //profile削除
    Route::get('/profile/{id}', 'Influ\ProfileController@showDetail')->name('showprofile');          //profile詳細を表示
    });
    
    //influ　ログイン後
Route::group(['prefix' => 'influ', 'middleware' => 'auth:influ'], function(){
    Route::post('logout', 'Influ\Auth\LoginController@logout')->name('influ.logout');
    Route::get('home', 'Influ\HomeController@index')->name('influ.home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
     
    

 