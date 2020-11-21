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



    //admin ログイン前 登録
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
    
    //admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::get('/profile', 'Admin\ProfileController@showList')->name('adminprofiles');             //PR希望会社一覧画面表示
    
    Route::get('/profile/create', 'Admin\ProfileController@showCreate')->name('admincreate');      //PR希望会社登録画面を表示
    Route::post('/profile/store', 'Admin\ProfileController@exeStore')->name('adminstore');         //PR希望会社を登録する
    Route::get('/blog/edit/{id}', 'Admin\ProfileController@showEdit')->name('adminprofileedit');   //PR希望会社編集画面を表示
    Route::post('/blog/update', 'Admin\ProfileController@exeUpdate')->name('adminprofileupdate');  //PR希望会社編集
    Route::post('/profile/delete/{id}', 'Admin\ProfileController@exeDelete')->name('admindelete'); //PR希望会社削除
    Route::get('/profile/{id}', 'Admin\ProfileController@showDetail')->name('adminshow');          //PR希望会社詳細を表示

    
    Route::get('home', 'Admin\InfluController@showList')->name('adminindex');                      //AdminHome インフルエンサー一覧
    Route::post('home', 'Admin\InfluController@showList')->name('adminindex');                     //インフルエンサー検索
    
    Route::get('home/work/create', 'WorkController@showCreate')->name('workcreate');               //仕事登録画面を表示
    
    Route::post('home/work/store', 'WorkController@exeStore')->name('workstore');                  //仕事を登録する

    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    });


    //influ　ログイン前 登録
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

    
    //influ　ログイン後
Route::group(['prefix' => 'influ', 'middleware' => 'auth:influ'], function(){
    Route::get('/home/profile', 'Influ\ProfileController@showList')->name('profiles');                    //profile一覧画面を表示
    
    Route::get('/home/profile/create', 'Influ\ProfileController@showCreate')->name('profilecreate');      //profile登録画面を表示
    Route::post('/home/profile/store', 'Influ\ProfileController@exeStore')->name('profilestore');         //profileを登録する
    Route::get('/home/profile/edit/{id}', 'Influ\ProfileController@showEdit')->name('profileedit');       //profile編集画面を表示
    Route::post('/home/profile/update', 'Influ\ProfileController@exeUpdate')->name('profileupdate');      //profile編集
    Route::post('/home/profile/delete/{id}', 'Influ\ProfileController@exeDelete')->name('profiledelete'); //profile削除
    Route::get('/home/profile/{id}', 'Influ\ProfileController@showDetail')->name('showprofile');          //profile詳細を表示s
    
    
     Route::get('/home/blog', 'Influ\BlogController@showList')->name('blogs');                 //blog一覧画面を表示
    
    Route::get('/home/blog/create', 'Influ\BlogController@showCreate')->name('create');       //blog登録画面を表示
    Route::post('/home/blog/store', 'Influ\BlogController@exeStore')->name('store');          //blogを登録する
    Route::get('/home/blog/edit/{id}', 'Influ\BlogController@showEdit')->name('edit');        //blog編集画面を表示
    Route::post('/home/blog/update', 'Influ\BlogController@exeUpdate')->name('update');       //blog編集
    Route::post('/home/blog/delete/{id}', 'Influ\BlogController@exeDelete')->name('delete');  //blog削除
    Route::get('/home/blog/{id}', 'Influ\BlogController@showDetail')->name('show');           //blog詳細を表示
    
    
    Route::get('/home/request', 'Influ\RequestController@request')->name('request');           //お仕事依頼ページ
    
    
    Route::post('logout', 'Influ\Auth\LoginController@logout')->name('influ.logout');
    Route::get('/home', 'Influ\HomeController@index')->name('index');                          //InfluHome 
   
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
     
    

 