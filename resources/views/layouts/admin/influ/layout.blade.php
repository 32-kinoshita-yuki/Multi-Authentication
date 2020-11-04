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
     <link href="http://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
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
        <a class="navbar-brand" href="#">従業員リスト</a>
        </div>
        </div>
    </nav>
 
      <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
       @yield('content')
      </div><!-- /.container -->
 
       @yield('table')
   
</body>
</html>



 