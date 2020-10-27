@extends('layouts.profile.layout')
@section('title','プロフィール詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $blog->title }}</h2>
      <span>作成日:{{ $profile->gender }}</span>
      <span>更新日:{{ $profile->age }}</span>
      <span>SNSの種類:{{ $profile->sns_kind }}</span>
  </div>
</div>
</div>
@endsection
   