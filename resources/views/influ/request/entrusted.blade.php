@extends('layouts.influ.profile.layout')
@section('title','受託したお仕事の進歩状況')
@section('content')
<div class="content"> 
<div class="row">
<div class="col-md-10 col-md-offset-2">
   <h2>受託したお仕事</h2>
      @if (session('err_msg'))
      <p class="texit-danger">
         {{ session('err_msg') }}
      </p>
      @endif
      
    <table class="table table-striped">
          <tr>
              <th>受託したお仕事</th>
          </tr>
       　　@foreach($works as $work)
       　　<tr>
       　　    <td>{{ $work->name_company }}</td> 
       　　</tr>
       　　@endforeach
    </table>
</div><!--col-md-10 col-md-offset-2-->
</div><!--row-->
</div> <!--content-->
@endsection