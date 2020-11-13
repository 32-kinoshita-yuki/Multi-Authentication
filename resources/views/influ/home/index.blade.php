@extends('layouts.influ.profile.layout')
@section('title','MYページ')
@section('content')
<div class="content"> 
<div class="row">
  <div class="profile">
  <div class="col-md-8 col-md-offset-2">
    <h2>MYプロフィール</h2>
      <h2>{{  Auth::user()->name }}</h2>
     <span>性別:{{  Auth::user()->gender }}</span><br>
     <span2>年齢:{{  Auth::user()->age }}</span2><br>
     <span>使用するsns:{{ Auth::user()->sns_kind }}</span><br>
     <span2>SNSのURL:{{  Auth::user()->sns_url }}</span2><br>
     <span>SNSのジャンル:{{  Auth::user()->sns_genre }}</span><br><br>
  </div><!--col-md-8 col-md-offset-2-->
 </div><!--profile-->
 
   <div class="request">
     <div class="row">
  <div class="col-md-10 col-md-offset-2">
   お仕事依頼状況
   </div>
  </div>
  </div> <!--request-->
  
  <div class="blog">
   <div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>ブログ記事一覧</h2>
      @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
      <table class="table table-striped">
          <tr>
              <th>記事番号</th>
              <th>タイトル</th>
              <th>日付</th>
              <th></th>
              <th></th>
          </tr>
         
         <tr>
           <td>{{ Auth::user()->id }}</td>
           <td><a href="{{ route('show', ['id' => Auth::user()->id]) }}">{{ Auth::user()->title }}</a></td>
           <td>{{ Auth::user()->updated_at }}</td>
           <td><a class="btn btn-primary" href="{{ route('edit', ['id' => Auth::user()->id]) }}">編集</a></td>
           <form method="POST" action="{{ route('delete',Auth::user()->id) }}" onSubmit="return checkDelete()">
           @csrf
           <td><button type="submit" class="btnbtn-primary" onclick=>削除</button></td>
         </tr>
         
      </table>
      </div>
     </div>
    </div>
    <script>
    function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
    return true;
   } else {
    return false;
    }
   }
    </script>
  </div> <!--blog-->
  
 </div><!--row-->
</div> <!--content-->
@endsection