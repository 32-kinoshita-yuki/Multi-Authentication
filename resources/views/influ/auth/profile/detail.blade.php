@extends('layouts.profile.layout')
@section('title','プロフィール詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $profile->name }}</h2>
     <span>性別:{{ $profile->gender }}</span><br>
     <span>年齢:{{ $profile->age }}</span><br>
     <span>使用するsns:{{ $profile->sns_kind }}</span><br>
     <span>SNSのURL:{{ $profile->sns_url }}</span><br>
     <span>SNSのジャンル:{{ $profile->sns_genre }}</span><br><br>
    <button type="submit" class="btn btn-primary">
                    お仕事依頼を申し込む
                </button>
  </div>
</div>
@endsection
   