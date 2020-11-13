<?php

namespace App\Http\Controllers\Influ;  // Influ add

use App\Http\Controllers\Controller; //add
use Illuminate\Http\Request;
use App\Http\Controllers\Influ\ProfileController; //Profileコントローラー
use App\Http\Controllers\Influ\BlogController; //Blogコントローラー
use App\Profile; //Profileモデル
use App\Blog; //Blogモデル

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('influ.home.index');
        
    }
    
 
}
