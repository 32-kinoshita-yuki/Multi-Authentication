@extends('layouts.admin.influ.layout')
@section('title','インフルエンサー一覧')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>インフルエンサー一覧</h2>
     
     
     
      
       @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
      <table class="table table-striped">
          <tr>
              <th>ニックネーム</th>
              <th>性別</th>
              <th>年齢</th>
              <th>使用するSNS</th>
              <th>SNSのURL</th>
              <th>ジャンル</th>
              
             
          </tr>
          @foreach($profiles as $profile)
         <tr>
           <td><a href="{{ route('showprofile', ['id' => $profile->id]) }}">{{ $profile->name }}</a></td>
           <td>{{ $profile->gender }}</td>
           <td>{{ $profile->age }}</td>
           <td>{{ $profile->sns_kind }}</td>
           <td>{{ $profile->sns_url }}</td>
           <td>{{ $profile->sns_genre }}</td>
         </tr>
          @endforeach
      </table>
  </div>
</div>
</div>

@endsection
