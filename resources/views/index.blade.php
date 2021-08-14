<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <title>HOME</title>
</head>

<body>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        <br>{{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <h1 class="youkoso">ようこそ！<span class="name">{{ Auth::user()->name }}</span>さま！</h1>
    <div class="button">
        <button type="button" class="btn btn-reserve"><a href="{{ route('tableCount_page') }}">テーブル数登録</a></button>
        <br>
        <button type="button" onclick="location.href='kind_page'" class="btn btn-reserve">種類登録</button>
        <br>
        <button type="button" onclick="location.href='register_page'" class="btn btn-reserve">商品登録</button>
        <br>
        <button type="button" onclick="location.href='management_page'" class="btn btn-reserve">管理画面</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="http://localhost:8888/order_page/table=1&user_id=1">テーブル１page</a>
    </div>
</body>

</html>