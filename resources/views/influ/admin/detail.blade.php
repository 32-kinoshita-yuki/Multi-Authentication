@extends('layouts.influ.profile.layout')
@section('title','お仕事の詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $work->name_company }}</h2>
     
      <span>会社の住所:{{ $work->address }}</span><br>
      <span>担当者名:{{ $work->name }}</span><br>
      <span>報酬:{{ $work->price }}</span><br><br>
       <button type="submit" class="btn btn-primary">
                    PR活動を申し込む
                </button>
  </div>
</div>
</div>
@endsection
   