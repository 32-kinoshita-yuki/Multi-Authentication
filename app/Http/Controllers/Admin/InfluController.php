<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Influ\ProfileController; //Profileコントローラー
use App\Profile; //Profileモデル

class InfluController extends Controller
{
    /**
   * インフルエンサー一覧を表示
   * @param int $id
   * @return view
   */
    public function showList() 
    {
   $profiles = Profile::all();        //変数名$profilesにProfileモデルのデータをすべて渡す
      
     return view('admin.influ.index',    //profile一覧を表示する
     ['profiles' => $profiles]);     //profilesというキーを定義、受け取った$profilesを渡しviewに渡す
    }
}
