<?php

namespace App\Http\Controllers\Influ;

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
      
     return view('influ.profile.index',    //profile一覧を表示する
     ['profiles' => $profiles]);     //profilesというキーを定義、受け取った$profilesを渡しviewに渡す
    }
    /**
   * プロフィール詳細を表示する
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
       return view('influ.profile.detail',
        ['profile' => $profile]);
      
  }
  
   
     /**
   * プロフィールを登録する 表示
   * @return view
   */
   public function showCreate()              
   {
      return View('influ.profile.create'); //profile登録画面　表示
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
           abort(500);
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
       return view('influ.profile.edit',
       ['profile' => $profile]);
 }
 /**
   * プロフィールを編集する
   * @param int $id
   * @return view
   */
 public function exeUpdate(ProfileRequet $request)
 {
       //プロフィールのデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //プロフィールを登録
       $profile = Profile::find($inputs ['id']); 
       $profile->fill([
        'name' => $inputs['name'],
        'gender' => $inputs['gender'],
        'age' => $inputs['age'],
        'sns_kind' => $inputs['sns_kind'],
        'sns_url' => $inputs['sns_url'],
        'sns_genre' => $inputs['sns_genre'],
        ]);
        $profile->save();
        \DB::commit();
       } catch(\Throwable $e) {
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', 'プロフィールを更新しました');
      return redirect(route('profiles'));
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
           abort(500);
       }
     
      \Session::flash('err_msg','削除しました。');
       return redirect(route('profiles'));
 }
 
  
}