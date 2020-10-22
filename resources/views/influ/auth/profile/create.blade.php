@extends('layouts.profile.layout')
@section('title','プロフィール登録')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>プロフィール登録フォーム</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()"> 
         @csrf
            <div class="form-group">
                <label for="name">
                    ニックネーム
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
                <label for="gender">
                <input type="radio" class="form-contro2" name="gender" id="gender" value="{{ old('gender') }}">女性
                <input type="radio" class="form-contro2" name="gender" id="gender" value="{{ old('gender') }}">男性
                <input type="radio" class="form-contro2" name="gender" id="gender" value="{{ old('gender') }}">無回答
                </label>
               
                @if ($errors->has('gender'))  {{-- バリテーションを受け取るための処理 --}}
                    <div class="text-danger">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="age">
                    年齢
                </label>
                <input
                    id="age"
                    name="age"
                    class="form-control"
                    value="{{ old('age') }}"
                    type="age"
                >
                @if ($errors->has('age'))
                    <div class="text-danger">
                        {{ $errors->first('age') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="sns_kind">
                    使用するsns<br>
                    <input type="checkbox"  class="form-contro2" name="sns_kind" id="sns_kind" value="{{ old('sns_kind') }}">Instagram
                    <input type="checkbox"  class="form-contro2" name="sns_kind" id="sns_kind" value="{{ old('sns_kind') }}">Twitter
                    <input type="checkbox"  class="form-contro2" name="sns_kind" id="sns_kind" value="{{ old('sns_kind') }}">Youtube
                    <input type="checkbox"  class="form-contro2" name="sns_kind" id="sns_kind" value="{{ old('sns_kind') }}">その他
                </label>
                
                @if ($errors->has('sns_kind'))
                    <div class="text-danger">
                        {{ $errors->first('sns_kind') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="sns_url">
                    SNSのURL
                </label>
                <input
                    id="sns_url"
                    name="sns_url"
                    class="form-control"
                    value="{{ old('sns_url') }}"
                    type="text"
                >
                @if ($errors->has('sns_url'))
                    <div class="text-danger">
                        {{ $errors->first('sns_url') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="sns_genre">
                    SNSのジャンル<br>
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">プライベート
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">コスメ
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">モデル
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">グラビア
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">料理
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">生活・インテリア
                    <input type="checkbox"  class="form-contro2" name="sns_genre" id="sns_genre" value="{{ old('sns_genre') }}">その他
                </label>
                
                @if ($errors->has('sns_genre'))
                    <div class="text-danger">
                        {{ $errors->first('sns_genre') }}
                    </div>
                @endif
            </div>
            
            <div class="mt-5">
                
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
</div>
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