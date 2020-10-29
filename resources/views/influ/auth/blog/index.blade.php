@extends('layouts.blog.layout')
@section('title','ブログ一覧')
@section('content')
<div class="content"> 
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
          @foreach($blogs as $blog)
         <tr>
           <td>{{ $blog->id }}</td>
           <td><a href="{{ route('show', ['id' => $blog->id]) }}">{{ $blog->title }}</a></td>
           <td>{{ $blog->updated_at }}</td>
           <td><a class="btn btn-primary" href="{{ route('edit', ['id' => $blog->id]) }}">編集</a></td>
           <form method="POST" action="{{ route('delete',$blog->id) }}" onSubmit="return checkDelete()">
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
   