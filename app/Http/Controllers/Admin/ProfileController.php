<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminProfile;
use App\Http\Requests\AdminProfileRequet;

class ProfileController extends Controller
{
     /**
   * PR希望会社一覧を表示
   * @param int $id
   * @return view
   */
    public function showList() 
    {
     $admin_profiles = AdminProfile::all();        //変数名$admin_profilesに AdminProfileモデルのデータをすべて渡す
      
     return view('admin.profile.index',    //profile一覧を表示する
    ['admin_profiles' => $admin_profiles]);     //adminprofilesというキーを定義、受け取った$adminprofilesを渡しviewに渡す
    }
     /**
   * PR希望会社詳細を表示する
   * @param int $id
   * @return view
   */
  public function showDetail($id) 
  {
      $admin_profile = AdminProfile::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
        if (is_null($admin_profile))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('adminprofiles'));
        }
       return view('admin.profile.detail',
        ['admin_profile' => $admin_profile]);
      
  }
    /**
   *PR希望会社を登録する 表示
   * @return view
   */
   public function showCreate()              
   {
      return View('admin.profile.create'); //profile登録画面　表示
   }
  /**
   * PR希望会社を登録する post
   */
   public function exeStore(AdminProfileRequet $request) 
   {
       //PR希望会社のデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //PR希望会社を登録
       AdminProfile::create($inputs); 
        \DB::commit();
       }catch(\Throwable $e) {
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', 'PR希望会社を登録しました');
      return redirect(route('adminprofiles'));
   }
   /**
   * PR希望会社編集フォームを表示する
   * @param int $id
   * @return view
   */
   public function showEdit($id) 
   {
     $admin_profile = AdminProfile::find($id);                   //変数名$profileにProfileモデルのデータをすべて渡す
        if (is_null($admin_profile))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('adminprofiles'));
        }
       return view('admin.profile.edit',
       ['admin_profile' => $admin_profile]);
    }
    /**
   * PR希望会社を編集する
   * @param int $id
   * @return view
   */
 public function exeUpdate(AdminProfileRequet $request)
 {
       //プロフィールのデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //プロフィールを登録
       $admin_profile = AdminProfile::find($inputs ['id']); 
       if (is_null($admin_profile)){
          abort(404);
          }
       $admin_profile->fill([
        'name_company' => $inputs['name_company'],
        'name' => $inputs['name'],
        'address' => $inputs['address'],
        'email' => $inputs['email'],
        'tel' => $inputs['tel'],
        'url_company' => $inputs['url_company'],
        'url_pr' => $inputs['url_pr'],
        'body_pr' => $inputs['body_pr'],
        'price' => $inputs['price'],
        ]);
        $admin_profile->save();
        \DB::commit();
       } catch(\Throwable $e) {
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', 'プロフィールを更新しました');
      return redirect(route('adminprofiles'));
 }
  /**
   * PR希望会社プロフィール削除を表示する
   * @param int $id
   * @return view
   */
   public function exeDelete($id) 
   {
     if (empty($id)) {                    //もし空だったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('adminprofiles'));
        }
     try {
       //PR希望会社プロフィールを削除
      AdminProfile::destroy($id);                   //変数名$profileにProfileモデルのデータをすべて渡す
       }catch(\Throwable $e) {
           abort(500);
       }
     
      \Session::flash('err_msg','削除しました。');
       return redirect(route('adminprofiles'));
   }
}
