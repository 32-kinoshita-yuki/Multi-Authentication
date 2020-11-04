@extends('layouts.admin.influ.layout')
@section('title','インフルエンサー一覧')
@section('content')

<form action="{{ route('admin.influ.search') }}" method="get" role="form">
  {!! csrf_field() !!}
 
  <div class="form-group">
  <label for="gender" class="control-label col-xs-2">性別</label>
   <div class="col-xs-10">
    <select name="dept_name" class="form-control select select-primary mbl" data-toggle="select">
     <option value="">全部署</option>
     <option value="総務部" @if($gender=='総務部') selected @endif>総務部</option>
     <option value="経理部" @if($gender=='経理部') selected @endif>経理部</option>
    </select>
   </div>
  </div>
 
<div class="form-group">
  <label for="number" class="control-label col-xs-2">使用するSNS</label>
  <div class="col-xs-10">
  <select name="sns_kind" class="form-control select select-primary mbl" data-toggle="select">
    <option value="">全国</option>
     <optgroup label="関東">
     <option value="Instagram" @if($sns_kind1=='Instagram') selected @endif>Instagram</option>
     <option value="Twitter" @if($sns_kind2=='Twitter') selected @endif>Twitter</option>
     <option value="Youtube" @if($sns_kind3=='Youtube') selected @endif>Youtube</option>
     <option value="その他" @if($sns_kind4=='その他') selected @endif>その他</option>
   </optgroup>
  </select>
  </div>
</div>
 
 <div class="form-group">
  <label for="number" class="control-label col-xs-2">住所</label>
   <div class="col-xs-10">
    <select name="sns_genre" class="form-control select select-primary mbl" data-toggle="select">
    <option value="">全国</option>
     <optgroup label="関東">
     <option value="プライベート" @if($sns_kind1=='プライベート') selected @endif>プライベート</option>
     <option value="コスメ" @if($sns_kind2=='コスメ') selected @endif>コスメ</option>
     <option value="モデル" @if($sns_kind3=='モデル') selected @endif>モデル</option>
     <option value="グラビア" @if($sns_kind4=='グラビア') selected @endif>グラビア</option>
     <option value="料理" @if($sns_kind4=='料理') selected @endif>料理</option>
     <option value="生活・インテリア" @if($sns_kind4=='生活・インテリア') selected @endif>生活・インテリア</option>
     <option value="その他" @if($sns_kind4=='その他') selected @endif>その他</option>
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
  <th>部署</th>
  <th>従業員名</th>
  <th>住所</th>
  </tr>
  <!-- loop -->
  @foreach($employees as $employee)
  <tr>
  <td>{{$profile->gender}}</td>
  <td>{{$profile->sns_kind}}</td>
  <td>{{$profile->sns_genre}}</td>
  </tr>
  @endforeach
</table>
 
@endsection