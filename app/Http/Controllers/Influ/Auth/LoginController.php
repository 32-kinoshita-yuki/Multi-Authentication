<?php

namespace App\Http\Controllers\Influ\Auth; // Influ add

use App\Http\Controllers\Influ\Auth;  //add
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;  // add

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/influ/home';

    ///**
    // * Create a new controller instance.
    // *
    // * @return void
    // */
    //public function __construct()
    //{
    //   $this->middleware('guest')->except('logout');
    //}
    
    // ログイン画面
    public function showLoginForm()
    {
        return view('influ.auth.login'); //管理者ログインページのテンプレート
    }

    protected function guard()
    {
        return \Auth::guard('influ'); //管理者認証のguardを指定
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/influ/');  // ログアウト後のリダイレクト先
    }
    
}
