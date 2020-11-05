<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ asset('css/blog.css') }}" rel="stylesheet" type="text/css">
     <link href="http://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"><!-- FontAwesome -->
     <link href="{{ url('/') }}/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- Loading Bootstrap -->
     <link href="{{ url('/') }}/dist/css/flat-ui.min.css" rel="stylesheet"><!-- Loading Flat UI -->
     <link href="{{ url('/') }}/css/starter-template.css" rel="stylesheet"><!--Bootstrap theme(Starter)-->
  <link rel="shortcut icon" href="{{ url('/') }}/dist/img/favicon.ico">
</head>
<body>
    <header id="top-head">
     @include('layouts.admin.influ.header')
    </header>
    <!--=================================================
    Navbar
     ==================================================-->
    
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
       <div class="container-fluid">
         <!-- スマートフォンサイズで表示されるメニューボタンとテキスト -->
         <div class="navbar-header">
        <!-- タイトルなどのテキスト -->
         <a class="navbar-brand" href="#">インフルエンサー一覧</a>
        </div>
       </div>
    </nav>
 
      <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
       @yield('content')
      </div><!-- /.container -->
 
       @yield('table')
       <!-- Bootstrap core JavaScript
  ================================================== -->
<script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
<script src="{{ url('/') }}/dist/js/vendor/video.js"></script>
<script src="{{ url('/') }}/dist/js/flat-ui.min.js"></script>
 
<script src="{{ url('/') }}/assets/js/prettify.js"></script>
<script src="{{ url('/') }}/assets/js/application.js"></script>
 
@yield('scripts')
   
</body>
</html>



 