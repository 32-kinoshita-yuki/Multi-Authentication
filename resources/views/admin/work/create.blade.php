@extends('layouts.admin.influ.layout')
@section('title', '仕事登録')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>お仕事登録フォーム</h2>
        <form method="POST" action="{{ route('workstore') }}" onSubmit="return checkSubmit()">
          @csrf
          
           <div class="form-group">
                <label for="pr">
                    PR内容
                </label>
                <textarea
                    id="pr"
                    name="pr"
                    class="form-control"
                    rows="4"
                >{{ old('pr') }}</textarea>
                @if ($errors->has('pr'))
                    <div class="text-danger">
                        {{ $errors->first('pr') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="pr_price">
                    PR報酬
                </label>
                <input
                    id="pr_price"
                    name="pr_price"
                    class="pr_price"
                    value="{{ old('pr_price') }}"
                    type="text"
                >
                @if ($errors->has('pr_price'))
                    <div class="text-danger">
                        {{ $errors->first('pr_price') }}
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