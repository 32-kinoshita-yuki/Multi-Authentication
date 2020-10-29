@extends('layouts.adminprofile.layout')
@section('title','PR希望会社詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $admin_profile->name_company }}</h2>
     
      <span>会社の住所:{{ $admin_profile->address }}</span><br>
      <span>担当者名:{{ $admin_profile->name }}</span><br>
      <span>報酬:{{ $admin_profile->price }}</span><br><br>
       <button type="submit" class="btn btn-primary">
                    PR活動を申し込む
                </button>
  </div>
</div>
</div>
@endsection
   