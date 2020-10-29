@extends('layouts.adminprofile.layout')
@section('title','PR希望会社編集')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>マイプロフィール登録編集フォーム</h2>
         <form method="POST" action="{{ route('adminprofileupdate') }}" onSubmit="return checkSubmit()"> 
         @csrf
            <div class="form-group">
                <label for="name_company">
                    会社名
                </label>
                <input
                    id="name_company"
                    name="name_company"
                    class="form-control"
                    value="{{ $admin_profile->name_company}}"
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
                    担当者
                </label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ $admin_profile->name}}"
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
                    value="{{ $admin_profile->address }}"
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
                    value="{{ $admin_profile->email }}"
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
                    value="{{ $admin_profile->tell }}"
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
                    value="{{ $admin_profile->url_company }}"
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
                    value="{{ $admin_profile->url_pr }}"
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
                    value="{{ $admin_profile->body_pr  }}"
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
                    value="{{ $admin_profile->price }}"
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
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection