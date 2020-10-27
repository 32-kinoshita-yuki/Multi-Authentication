@extends('layouts.adminprofile.layout')
@section('title','PR希望会社一覧')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>PR希望会社一覧</h2>
       @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
      <table class="table table-striped">
          <tr>
              <th>会社の名前</th>
              <th>PR商品やサービスの説明</th>
              <th>PR料金</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($admin_profiles as $admin_profile)
         <tr>
           <td><a href="{{ route('adminshow', ['id' => $admin_profile->id]) }}">{{ $admin_profile->name }}</a></td>
           <td>{{ $admin_profile->body_pr }}</td>
           <td>{{ $admin_profile->price }}</td>
          
           <td><button type="button" class="btnbtn-primary" onclick="location.href='/admin/profile/edit/{{ $admin_profile->id }}'">編集</button></td>
           <form method="POST" action="{{ route('admindelete',$admin_profile->id) }}" onSubmit="return checkDelete()">
           @csrf
           <td><button type="submit" class="btnbtn-primary" onclick=>削除</button></td>
         </tr>
          @endforeach
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
@endsection