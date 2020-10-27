<?php

namespace App\Http\Controllers\Influ\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Http\Requests\ProfileRequet;
class ProfileController extends Controller
{
  /**
   * インフルエンサー一覧を表示
   * @param int $id
   * @return view
   */
    public function showList() 
    {
   $profiles = Profile::all();        //変数名$profilesにProfileモデルのデータをすべて渡す
      
     return view('influ.auth.profile.index',    //profile一覧を表示する
     ['profiles' => $profiles]);     //profilesというキーを定義、受け取った$profilesを渡しviewに渡す
    }
    /**
   * ブログ詳細を表示する
   * @param int $id
   * @return view
   */
   
    
  public function showDetail($id) 
  {
      $profile = Profile::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
        if (is_null($profile))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('profiles'));
        }
       return view('influ.auth.profile.detail',
        ['profile' => $profile]);
      
  }
  
   
     /**
   * プロフィールを登録する 表示
   * @return view
   */
   public function showCreate()              
   {
      return View('influ.auth.profile.create'); //profile登録画面　表示
   }
  /**
   * プロフィールを登録する post
   */
   public function exeStore(ProfileRequet $request) 
   {
       //プロフィールのデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //プロフィールを登録
       Profile::create($inputs); 
        \DB::commit();
       }catch(\Throwable $e) {
        \DB::rollback();
           about(500);
       }
       
       \Session::flash('err_msg', 'プロフィールを登録しました');
      return redirect(route('profiles'));
   }
   
   /**
   * プロフィール編集フォームを表示する
   * @param int $id
   * @return view
   */
 public function showEdit($id) 
 {
     $profile = Profile::find($id);                   //変数名$profileにProfileモデルのデータをすべて渡す
        if (is_null($profile))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('profiles'));
        }
       return view('influ.auth.profile.edit',
       ['profile' => $profile]);
 }
  /**
   * プロフィール削除を表示する
   * @param int $id
   * @return view
   */
   public function exeDelete($id) 
 {
     if (empty($id)) {                    //もし空だったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('profiles'));
        }
     try {
       //プロフィールを削除
      Profile::destroy($id);                   //変数名$profileにProfileモデルのデータをすべて渡す
       }catch(\Throwable $e) {
           about(500);
       }
     
      \Session::flash('err_msg','削除しました。');
       return redirect(route('profiles'));
 }
  
}