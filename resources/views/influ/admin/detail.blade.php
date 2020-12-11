@extends('layouts.influ.profile.layout')
@section('title','お仕事の詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="POST" action="{{ route('entrust') }}" onSubmit="return checkSubmit()"> <!--web.php#L98-->
      <h2>{{ $work->name_company }}</h2>
      <input> ID:{{ $work->id}}</span><br>
      <span>会社の住所:{{ $work->address }}</span><br>
      <span>会社のurl:{{ $work->url_company }}</span><br>
      <span>メールアドレス:{{ $work->email }}</span><br>
      <span>担当者名:{{ $work->name }}</span><br>
      <span>PRの内容:{{ $work->body_pr }}</span><br>
      <span>PR商品やサービスのurl:{{ $work->url_pr }}</span><br>
      <span>報酬:{{ $work->price }}</span><br><br>
       <button type="submit" class="btn btn-primary">
                    PR依頼を受け入れる
       </button>
    </form>
  </div><!--col-md-8 col-md-offset-2-->
  </div><!--row-->
</div><!--content-->
@endsection
   