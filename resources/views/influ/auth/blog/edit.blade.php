@extends('layouts.blog.layout')
@section('title','ブログ編集')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ブログ編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmitss()">
         @csrf
         <input type="hidden" name="id" value="{{ $blog->id }}">
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $blog->title }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="body">
                    本文
                </label>
                <textarea
                    id="body"
                    name="body"
                    class="form-control"
                    rows="4"
                >{{ $blog->body }}</textarea>
                @if ($errors->has('body'))  {{-- バリテーションを受け取るための処理 --}}
                    <div class="text-danger">
                        {{ $errors->first('body') }}
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