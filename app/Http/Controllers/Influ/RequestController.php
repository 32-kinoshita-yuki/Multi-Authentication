<?php

namespace App\Http\Controllers\Influ;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;//workモデルの呼び出し
use App\Http\Requests\WorkRequest;//workリクエストの呼び出し
use Illuminate\Support\Facades\Auth;//Authの追加

class RequestController extends Controller
{
   /**
   * インフルエンサーログイン時お仕事依頼一覧を表示する
   */
    public function request() 
    {
     // $works = Work::all();              //変数名$worksにWorkモデルのデータをすべて渡す
     $query = Work::query();
     $query->where('influid', Auth::guard('influ')->user()->id);
     $work = $query->get();
     
      return view('influ.request.index' ,   //仕事依頼一覧を表示する
     ['works' => $works]);              //worksというキーを定義、受け取った$blogsを渡しviewに渡す
    }
    
}
