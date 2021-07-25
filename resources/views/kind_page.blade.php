<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>注文ページ</title>
</head>

<body>
    <ul style="color: red;">
        @if ($errors->has('name'))
        <li>{{ $errors->first('name') }}</li>
        @endif
    </ul>
    <h1>種類登録</h1>
    <form action="{{ route('kind_store') }}" method="post">
        @csrf
        <div class="contents-box">
        </div>
        <div class="contents-box">
            <label>種類名</label><br>
            <input name="name" type="text" autocomplete="off" value=""><br>
        </div>
        <input name="send" type="submit" value="登録">
    </form>
    @if(Session::has('name'))
    <div>
        <p style="color: red;text-align: center;">種類に<span class="sessionMark">【{{ session('name') }}】</span>の欄を追加しました</p>
    </div>
    @endif
</body>

</html>