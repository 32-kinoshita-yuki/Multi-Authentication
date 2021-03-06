@extends('layouts.admin.profile.layout')
@section('title','お仕事一覧')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>お仕事一覧</h2>
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
          @foreach($works as $work)
         <tr>
           <td><a href="{{ route('adminshow', ['id' => $work->id]) }}">{{ $work->name_company }}</a></td>
           <td>{{ $work->body_pr }}</td>
           <td>{{ $work->price }}</td>
          
          <td><a class="btn btn-primary" href="{{ route('adminprofileedit', ['id' => $work->id]) }}">編集</a></td>
           <form method="POST" action="{{ route('admindelete',$work->id) }}" onSubmit="return checkDelete()">
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