@extends('layouts.admin.influ.layout')
@section('title','インフルエンサー一覧')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>インフルエンサー一覧</h2>
     
 <!--=================================================
  Form
  ==================================================-->
   <form action="{{ route('adminprofiles') }}" method="get" role="form">
  {!! csrf_field() !!}
 
  <div class="form-group">
   <label for="number" class="control-label col-xs-2">性別</label>
    <div class="col-xs-10">
     <select name="gender" class="form-control select select-primary mbl" data-toggle="select">
      <option value="">性別</option>
      <option value="男性"  selected >男性</option>
      <option value="女性"  selected >女性</option>
     </select>
    </div>
  </div>
 
  
 <div class="form-group">
  <label for="number" class="control-label col-xs-2">使用するSNS</label>
  <div class="col-xs-10">
  <select name="sns_kind" class="form-control select select-primary mbl" data-toggle="select">
     <option value="">使用するSNS</option>
     <option value="Instagram">Instagram</option>
     <option value="Twitter" >Twitter</option>
     <option value="Youtube" >Youtube</option>
     <option value="その他" >その他</option>
  </select>
  </div>
 </div>
 
 <div class="form-group">
  <label for="number" class="control-label col-xs-2">SNSのジャンル</label>
  <div class="col-xs-10">
  <select name="sns_genre" class="form-control select select-primary mbl" data-toggle="select">
     <option value="">SNSのジャンル</option>
     <option value="プライベート">プライベート</option>
     <option value="コスメ" >コスメ</option>
     <option value="モデル" >モデル</option>
     <option value="グラビア" >グラビア</option>
     <option value="料理" >料理</option>
     <option value="生活・インテリア" >生活・インテリア</option>
     <option value="その他" >その他</option>
  </select>
  </div>
 </div>
 
  <div class="form-group">
  <div class="col-xs-offset-2 col-xs-10 text-center">
  <button type="submit" class="btn btn-default">検索</button>
  </div>
  </div>
 
  </form>
      
      
       @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
  @section('table')
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
  @endsection
  
   
 
@endsection <!--cntent-->
 
 



  
  
  
  </div>
 </div>
</div>


