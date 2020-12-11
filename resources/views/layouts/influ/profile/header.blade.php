	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MYページ</a>
  <div class="user_id">{{ Auth::user()->name }}</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ route('store') }}">MYブログ<span class="sr-only"></span></a>
      <a class="nav-item nav-link active" href="{{ route('profilecreate') }}">プロフィール作成</a>
      <a class="nav-item nav-link active" href="{{ route('profilecreate') }}">お知らせ</a>
    </div>
  </div>
</nav>