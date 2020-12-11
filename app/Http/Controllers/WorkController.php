<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\Log;

class WorkController extends Controller
{
    /**
   * 仕事一覧を表示する
   */
   
    public function showList()  
   {
     $works = Work::all();              //変数名$worksにWorkモデルのデータをすべて渡す
      
     return view('admin.profile.index',    //仕事一覧を表示する
     ['works' => $works]);              //worksというキーを定義、受け取った$blogsを渡しviewに渡す
    }
     /**
   * 仕事詳細を表示する
   */
  public function showDetail($id) 
  {
      $work = Work::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
       
        if (is_null($work))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('adminprofiles'));
        }
       return view('admin.profile.detail',
        ['work' => $work]);
      
  }
   /**
   * 仕事を登録する 表示
   */
   public function showCreate()              
   {
      return View('admin.influ.detail'); //登録画面　表示
   }
   
  /**
   * 仕事を登録する post
   */
   public function exeStore(WorkRequest $request) 
   {
       //仕事のデータを受け取る
       $inputs = $request->all();
       
       // DEBUG
       Log::debug('WorkController start exeStore');//
       Log::debug('WorkController inputs:' . print_r($inputs) );//配列を出力するためのコマンド
       
       \DB::beginTransaction();
       try {
           //仕事を登録
            Work::create($inputs); 
            \DB::commit();
            }catch(\Throwable $e) {
           Log::debug('WorkController '. $e);   //キャッチでとった＄eをLOｇで出力する 絶対必要
              
            \DB::rollback();
               abort(500);
            }
       \Session::flash('err_msg', '仕事を登録しました');
       
        Log::debug ('WorkController end exeStore');//LOG
       
      return redirect(route('adminindex'));
   }
   /**
   * 仕事編集フォームを表示する
   * @param int $id
   * @return view
   */
   public function showEdit($id) 
   {
     $work = Work::find($id);                   //変数名$workにWorkモデルのデータをすべて渡す
        if (is_null($work))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('adminprofiles'));
        }
       return view('admin.profile.edit',
       ['work' => $work]);
    }
    /**
   * 仕事を編集する
   * @param int $id
   * @return view
   */
 public function exeUpdate(WorkRequest $request)
 {
       //仕事のデータを受け取る
       $inputs = $request->all();
       
        // DEBUG
       Log::debug('WorkController start exeUpdate');//
       Log::debug('WorkController inputs:' . print_r($inputs) );//配列を出力するためのコマンド
       
       \DB::beginTransaction();
       try {
       //仕事を登録
       $work = Work::find($inputs ['id']); 
       $work->fill([
        'name_company' => $inputs['name_company'],
        'name' => $inputs['name'],
        'address' => $inputs['address'],
        'email' => $inputs['email'],
        'tell' => $inputs['tell'],
        'url_company' => $inputs['url_company'],
        'url_pr' => $inputs['url_pr'],
        'body_pr' => $inputs['body_pr'],
        'price' => $inputs['price'],
        ]);
        $work->save();
        \DB::commit();
       } catch(\Throwable $e) {
        Log::debug('WorkController '. $e);   //キャッチでとった＄eをLOｇで出力する 絶対必要
        
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', '仕事を更新しました');
      return redirect(route('adminprofiles'));
 }
  /**
   *仕事削除を表示する
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
       //仕事を削除
      Work::destroy($id);                   //変数名workにWorkモデルのデータをすべて渡す
       }catch(\Throwable $e) {
           abort(500);
       }
     
      \Session::flash('err_msg','削除しました。');
       return redirect(route('adminprofiles'));
   }
   
    /**
   * インフルエンサーに仕事一覧を表示する
   */
   
    public function workList()  
   {
     $works = Work::all();              //変数名$worksにWorkモデルのデータをすべて渡す
      
     return view('influ.admin.index',    //仕事一覧を表示する
     ['works' => $works]);              //worksというキーを定義、受け取った$blogsを渡しviewに渡す
    }
     /**
   * インフルエンサーに仕事詳細を表示する
   */
  public function workDetail($id) 
  {
      $work = Work::find($id);     //変数名$profileにProfileモデルのデータをすべて渡す
       
        if (is_null($work))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
           return redirect(route('works'));
        }
       return view('influ.admin.detail',
        ['work' => $work]);
      
  }
     /**
   * インフルエンサが仕事を受託する
   */
    public function entrust(WorkRequest $request)
  {
       //仕事のデータを受け取る
       $inputs = $request->all();
       
       // DEBUG
       Log::debug('WorkController start exeStore');//
       Log::debug('WorkController inputs:' . print_r($inputs) );//配列を出力するためのコマンド
       
      \DB::beginTransaction();
      try {
      //仕事を登録
       $work = Work::find($inputs ['id']); 
       $work->fill([
      'status' => 3,//ステータスを3へ
      ]);
       $work->save();
       \DB::commit();
      } catch(\Throwable $e) {
      Log::debug('WorkController '. $e);   //キャッチでとった＄eをLOｇで出力する 絶対必要

      \DB::rollback();
       abort(500);
        \Session::flash('err_msg','お仕事依頼を受託しました。');
        return redirect(route('index'));
   }
  }
}