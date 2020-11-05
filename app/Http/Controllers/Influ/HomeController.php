<?php

namespace App\Http\Controllers\Influ;  // Influ add

use App\Http\Controllers\Controller; //add
use Illuminate\Http\Request;
use App\Http\Controllers\Influ\ProfileController; //Profileコントローラー
use App\Profile; //Profileモデル

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
        return view('influ.home');
    }
     /**
   * プロフィール詳細を表示する
   * @param int $id
   * @return view
   */
  public function showDetail($id) 
  {
      $profile = Profile::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す


       return view('influ.home.index',
        ['profile' => $profile]);
      
  }
}
