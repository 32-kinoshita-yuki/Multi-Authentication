<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
    
   /**
   * 仕事を登録する 表示
   * @return view
    */
   public function showCreate()              
   {
      return View('admin.work.create'); //登録画面　表示
   }
   
  /**
   * 仕事を依頼する post
   */
   public function exeStore(WorkRequest $request) 
   {
       //仕事のデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
           //仕事を登録
            Work::create($inputs); 
            \DB::commit();
           }catch(\Throwable $e) {
       echo $e; //エラーを出力
        error_log($e,3, '../error.log');//ログを出力
        \DB::rollback();
           abort(500);
       }
       \Session::flash('err_msg', '仕事を登録しました');
      return redirect(route('adminindex'));
   }
}
