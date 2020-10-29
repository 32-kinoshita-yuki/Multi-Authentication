<?php

namespace App\Http\Controllers\Influ\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
  /**
   * ブログ一覧を表示する
   * @param int $id
   * @return view
   */
   
    public function showList()  
   {
     $blogs = Blog::all();                   //変数名$blogsにBlogモデルのデータをすべて渡す
      
     return view('influ.auth.blog.index',    //blog一覧を表示する
     ['blogs' => $blogs]);                   //blogsというキーを定義、受け取った$blogsを渡しviewに渡す
    }
  
  /**
   * ブログ詳細を表示する
   * @param int $id
   * @return view
   */
   
  public function showDetail($id) 
  {
      $blog = Blog::find($id);                   //変数名$blogにBlogモデルのデータをすべて渡す
       
       
        if (is_null($blog))
        {                    //もしnull（空）だったらindex('blogs')にredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('blogs'));
        }
       return view('influ.auth.blog.detail',
        ['blog' => $blog]);
      
  }
  
   /**
   * ブログを登録する 表示
   * @return view
   */
   public function showCreate()              
   {
      return View('influ.auth.blog.create'); //blog登録画面　表示
   }
  /**
   * ブログを登録する post
   */
   public function exeStore(BlogRequest $request) 
   {
       //ブログのデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //ブログを登録
       Blog::create($inputs); 
        \DB::commit();
       }catch(\Throwable $e) {
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', 'ブログを登録しました');
      return redirect(route('blogs'));
   }
   
   /**
   * ブログ編集フォームを表示する
   * @param int $id
   * @return view
   */
 public function showEdit($id) 
 {
     $blog = Blog::find($id);                   //変数名$blogにBlogモデルのデータをすべて渡す
        if (is_null($blog))
        {                    //もしnullだったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('blogs'));
        }
       return view('influ.auth.blog.edit',
       ['blog' => $blog]);
 }
 /**
   * ブログを編集する
   * @param int $id
   * @return view
   */
 public function exeUpdate(BlogRequest $request)
 {
       //ブログのデータを受け取る
       $inputs = $request->all();
       
       \DB::beginTransaction();
       try {
       //ブログを登録
       $blog = Blog::find($inputs ['id']); 
       $blog->fill([
        'title' => $inputs['title'],
        'body' => $inputs['body'],
        ]);
        $blog->save();
        \DB::commit();
       } catch(\Throwable $e) {
        \DB::rollback();
           abort(500);
       }
       
       \Session::flash('err_msg', 'ブログを更新しました');
      return redirect(route('blogs'));
 }
  /**
   * ブログ削除を表示する
   * @param int $id
   * @return view
   */
   public function exeDelete($id) 
 {
     if (empty($id)) {                    //もし空だったらindexにredirectさせる
            \Session::flash('err_msg','データがありません');
            return redirect(route('blogs'));
        }
     try {
       //ブログを削除
       Blog::destroy($id);                   //変数名$blogにBlogモデルのデータをすべて渡す
       }catch(\Throwable $e) {
           abort(500);
       }
     
      \Session::flash('err_msg','削除しました。');
       return redirect(route('blogs'));
 }
  
   
   
}
