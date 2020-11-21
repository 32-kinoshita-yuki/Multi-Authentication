@extends('layouts.admin.influ.layout')
@section('title', 'お仕事依頼')
@section('content')
<div class="content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>お仕事依頼フォーム</h2>
        <form method="POST" action="{{ route('workstore') }}" onSubmit="return checkSubmit()">
          @csrf
                <div class="form-group">
                <label for="pr">
                    PR商品やサービスの説明
                </label>
                <input
                    id="pr"
                    name="pr"
                    class="form-control"
                    value="{{ old('pr') }}"
                    type="text"
                >
                @if ($errors->has('pr'))
                    <div class="text-danger">
                        {{ $errors->first('pr') }}
                    </div>
                @endif
            </div>
            
            
           
          
            <div class="mt-5">
                
                <button type="submit" class="btn btn-primary">
                    依頼する
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