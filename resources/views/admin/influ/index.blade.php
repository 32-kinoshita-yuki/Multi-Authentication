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
  
  
    <!--=================================================
  Form
  ==================================================-->
   <form action="{{ route('search') }}" method="get" role="form">
  {!! csrf_field() !!}
 
  <div class="form-group">
   <label for="number" class="control-label col-xs-2">性別</label>
    <div class="col-xs-10">
     <select name="gender" class="form-control select select-primary mbl" data-toggle="select">
      <option value="">性別</option>
      <option value="$gender1"  selected >男性</option>
      <option value="$gender2"  selected >女性</option>
     </select>
    </div>
  </div>
 
  
 <div class="form-group">
  <label for="number" class="control-label col-xs-2">使用するSNS</label>
  <div class="col-xs-10">
  <select name="sns_kind" class="form-control select select-primary mbl" data-toggle="select">
    <option value="">全国</option>
    <optgroup label="使用するSNS">
     <option value="$sns_kind1">Instagram</option>
     <option value="$sns_kind2" >Twitter</option>
     <option value="$sns_kind3" >Youtube</option>
     <option value="$sns_kind4" >その他</option>
 </optgroup>
  
  </select>
  </div>
  </div>
 
  <div class="form-group">
  <div class="col-xs-offset-2 col-xs-10 text-center">
  <button type="submit" class="btn btn-default">検索</button>
  </div>
  </div>
 
  </form>
 
@endsection
 
 
 @section('table')
  <table class="table table-striped">
  <tr>
   <th>性別</th>
   <th>使用するSNS</th>
  </tr>
  <!-- loop -->
   @foreach($profiles as $profile)
  <tr>
   <td>{{$profile->gender}}</td>
   <td>{{$profile->sns_kind}}</td>
  </tr>
  @endforeach
</table> 
 

  
  
  
  
  </div>
 </div>
</div>

@endsection
