@extends('layouts.profile.layout')
@section('title','プロフィール登録')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>プロフィール登録フォーム</h2>
        <form method="POST" action="{{ route('profilestore') }}" onSubmit="return checkSubmit()"> 
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
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="女性">
                <label for="gender" >女性</label>
            </div>
                 
            <div class="form-group">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="男性">
                <label for="gender" >男性</label>
            </div>
             <div class="form-group">
                <input class="form-check-input" type="radio" name="gender" id="gender3" value="無回答">
                <label for="gender" >無回答</label>
            </div>
                 
                @if ($errors->has('gender'))  {{-- バリテーションを受け取るための処理 --}}
                    <div class="text-danger">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                
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
            
            使用するsns<br>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_kind" id="sns_kind1" value="Instagram">
              <label for="sns_kind">Instagram</lavel>
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_kind" id="sns_kind2" value="Twitter">
              <label for="sns_kind">Twitter</lavel>
            </div> 
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_kind" id="sns_kind3" value="Youtube">
              <label for="sns_kind">Youtube</lavel>
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_kind" id="sns_kind4" value="その他">
              <label for="sns_kind">その他</lavel>
            </div>
                
                @if ($errors->has('sns_kind'))
                    <div class="text-danger">
                        {{ $errors->first('sns_kind') }}
                    </div>
                @endif
         
            
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
            
              SNSのジャンル<br>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre1" value="プライベート">
              <label for="sns_genre">プライベート</lavel>
            </div>
           <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre2" value="コスメ">
              <label for="sns_genre">コスメ</lavel>
           </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre3" value="モデル">
              <label for="sns_genre">モデル</lavel>
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre4" value="グラビア">
              <label for="sns_genre">グラビア</lavel>
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre5" value="料理">
              <label for="sns_genre">グラビア</lavel>
            </div>
             <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre6" value="生活・インテリア">
              <label for="sns_genre">生活・インテリア</lavel>
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="sns_genre" id="sns_genre7" value="その他">
              <label for="sns_genre">その他</lavel>
            </div>
                
                @if ($errors->has('sns_genre'))
                    <div class="text-danger">
                        {{ $errors->first('sns_genre') }}
                    </div>
                @endif
            
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