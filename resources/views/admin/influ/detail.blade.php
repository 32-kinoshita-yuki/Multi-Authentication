@extends('layouts.admin.influ.layout')
@section('title','プロフィール詳細')
@section('content')
<div class="content"> 
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <form method="POST" action="{{ route('adminstore') }}" onSubmit="return checkSubmit()"> 
         @csrf
      <h2>{{ $profile->name }}</h2>
     ID: <input>{{ $profile->id}}</span><br>
     <span>性別:{{ $profile->gender }}</span><br>
     <span>年齢:{{ $profile->age }}</span><br>
     <span>使用するsns:{{ $profile->sns_kind }}</span><br>
     <span>SNSのURL:{{ $profile->sns_url }}</span><br>
     <span>SNSのジャンル:{{ $profile->sns_genre }}</span><br><br>
     
  
        <h2>お仕事依頼フォーム</h2>
        
         <div class="form-group">
                <label for="name_company">
                    インフルエンサーID
                </label>
                <input
                    id="influid"
                    name="influid"
                    class="form-control"
                    value="{{ $profile->id }}"
                    type="text"
                readonly>
            </div>
         
         
         
            <div class="form-group">
                <label for="name_company">
                    会社名
                </label>
                <input
                    id="name_company"
                    name="name_company"
                    class="form-control"
                    value="{{ old('name_company') }}"
                    type="text"
                >
                @if ($errors->has('name_company'))
                    <div class="text-danger">
                        {{ $errors->first('name_company') }}
                    </div>
                @endif
            </div>
         
            <div class="form-group">
                <label for="name">
                    担当者名
                </label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    type="text"
                >
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            
             <div class="form-group">
                <label for="address">
                    会社の住所
                </label>
                <input
                    id="address"
                    name="address"
                    class="form-control"
                    value="{{ old('address') }}"
                    type="text"
                >
                @if ($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="email">
                    メールアドレス
                </label>
                <input
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    type="email"
                >
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="tell">
                    会社の電話番号
                </label>
                <input
                    id="tell"
                    name="tell"
                    class="form-control"
                    value="{{ old('tell') }}"
                    type="text"
                >
                @if ($errors->has('tell'))
                    <div class="text-danger">
                        {{ $errors->first('tell') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="url_company">
                    会社のurl
                </label>
                <input
                    id="url_company"
                    name="url_company"
                    class="form-control"
                    value="{{ old('url_company') }}"
                    type="text"
                >
                @if ($errors->has('url_company'))
                    <div class="text-danger">
                        {{ $errors->first('url_company') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="url_pr">
                    PR商品やサービスのurl
                </label>
                <input
                    id="url_pr"
                    name="url_pr"
                    class="form-control"
                    value="{{ old('url_pr') }}"
                    type="text"
                >
                @if ($errors->has('url_pr'))
                    <div class="text-danger">
                        {{ $errors->first('url_pr') }}
                    </div>
                @endif
            </div>
            
　　　　　　<div class="form-group">
                <label for="body_pr">
                    PR商品やサービスの説明
                </label>
                <input
                    id="body_pr"
                    name="body_pr"
                    class="form-control"
                    value="{{ old('body_pr') }}"
                    type="text"
                >
                @if ($errors->has('body_pr'))
                    <div class="text-danger">
                        {{ $errors->first('body_pr') }}
                    </div>
                @endif
            </div>

             <div class="form-group">
                <label for="price">
                    PR料金
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="{{ old('price') }}"
                    type="text"
                >
                @if ($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            <div class="mt-5">
                
                <button type="submit" class="btn btn-primary">
                    依頼する
                </button>
            </div>
            
  </form>


   </div><!--==row===-->
  </div><!--===col-md-8 col-md-offset-2==-->
</div><!--==content==-->
<script>
   function checkSubmit(){
   if(window.confirm('送信してよろしいですか？')){
    return true;
   } else {
    return false;
   }
  }
</script>

@endsection