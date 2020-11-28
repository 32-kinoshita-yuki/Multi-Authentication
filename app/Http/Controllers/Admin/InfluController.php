<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Influ\ProfileController; //Profileコントローラー
use App\Profile; //Profileモデル
use App\Http\Requests\ProfileRequet;//Profileリクエスト

class InfluController extends Controller
{
    /**
   * インフルエンサー検索
   * インフルエンサー一覧
   * @param int $id
   * @return view
   */
    public function showList(Request $request)
{
$gender = $request->gender;
//sns_kind
$sns_kind = $request->sns_kind;
//sns_genre
$sns_genre = $request->sns_genre;

if( $gender == '' and $sns_kind == '' and $sns_genre == '') {
    $profiles = Profile::all();
} else {
    $query = Profile::query();

    if ($gender != '') {
        // 検索されたら検索結果を取得する
        $query->where('gender', 'like', '%'.$gender.'%');
    }

    if ($sns_kind != '') {
       // 検索されたら検索結果を取得する
       $query->where('sns_kind', 'like', '%'.$sns_kind.'%');
    }

    if ($sns_genre != '') {
       // 検索されたら検索結果を取得する
       $query->where('sns_genre', 'like', '%'.$sns_genre.'%');
    }

    $profiles = $query->get();

}

return view('admin.influ.index',   //profile一覧を表示する
['profiles' => $profiles]);        //profilesというキーを定義、受け取った$profilesを渡しviewに渡す
 }
 
   /**
   * インフルエンサーに仕事詳細を表示する
   * @param int $id
   * @return view
   */
  public function influDetail($id) 
  {
      $work = Work::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
        if (is_null($work))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('adminprofiles'));
        }
       return view('admin.influ.detail',
        ['work' => $work]);
      
  }
   
}

