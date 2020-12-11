@extends('layouts.influ.profile.layout')
@section('title','お仕事依頼状況')
@section('content')
<div class="content"> 
<div class="row">
<div class="col-md-10 col-md-offset-2">
   <h2>お仕事依頼一覧</h2>
      @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
    <table class="table table-striped">
          <tr>
              <th>依頼日</th>
              <th>会社名</th>
              <th>PR料金</th>
              <th>PR商品やサービスの説明</th>
          </tr>
       　　@foreach($works as $work)
       　　<tr>
       　　     <td>{{ $work->updated_at }}</td>
       　　     <td><a href="{{ route('workShow', ['id' => $work->id]) }}">{{$work->name_company }}</a></td>
              <td>{{ $work->price }}</td>
              <td>{{ $work->body_pr }}</td>
       　　</tr>
       　　@endforeach
    </table>
</div><!--col-md-10 col-md-offset-2-->
</div><!--row-->
</div> <!--content-->
@endsection