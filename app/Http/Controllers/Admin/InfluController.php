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
   *依頼者が見たインフルエンサー検索
   * 依頼者が見たインフルエンサー一覧
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
   * 依頼者が見たインフルエンサー仕事詳細を表示
   * @param int $id
   * @return view
   */
  public function influDetail($id) 
  {
      $profile = Profile::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
        if (is_null($profile))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('adminprofiles'));
        }
       return view('admin.influ.detail',
        ['profile' => $profile]);
      
  }
   
}

