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
    
  /**
   * インフルエンサープロフィール検索
   */
   public function search(ProfileRequet $request)
   {

    //検索する値を取得
    $gender = $request->gender;
    $sns_kind = $request->sns_kind; // 性別 0:指定なし 1:男 2:女 3:その他
    $sns_genre = $request->sns_genre; // ジャンル 0:指定なし 1:生活 2:インテリア News度

    // 検索QUERY
    $query = Profile::query();

    // 今後利用するがとりあえずここは無視
    // 結合
    //$query->join('depts', function ($query) use ($req) {
    //$query->on('employees.dept_id', '=', 'depts.id');
    //});

    // もし「gender」があれば
    if(!empty($gender)){ //
    $query->where('gender','like','%'.$gender.'%'); // カラム名 like
    }

   // もし「sns_kind」があれば
   if(!empty($sns_kind)){
    $query->where('sns_kind',$sns_kind);
    }


   // もし「sns_genre」があれば
   if(!empty($sns_genre)){
    $query->where('sns_genre',$sns_genre);
    }

   // ページネーション 件数がおおい場合にページに分ける処理

   $profiles = $query->get();

   return view('admin.influ.index', //profile一覧を表示する
   ['profiles' => $profiles]); //profilesというキーを定義、受け取った$profilesを渡しviewに渡す
 }
  
   
}

