<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>商品登録ページ</title>
</head>

<body>
    <ul style="color: red;">
        @if ($errors->has('kind'))
        <li>{{ $errors->first('kind') }}</li>
        @endif
        @if ($errors->has('name'))
        <li>{{ $errors->first('name') }}</li>
        @endif
        @if ($errors->has('amount'))
        <li>{{ $errors->first('amount') }}</li>
        @endif
    </ul>
    <h1>商品登録</h1>
    <form action="{{ route('product_store') }}" method="post">
        @csrf
        <div class="contents-box">
            <label>種類</label><br>
            <input name="kind" type="text" list="kind_example"><br>
            <datalist id="kind_example">
                <option value="にぎり"></option>
                <option value="軍艦巻き"></option>
                <option value="汁物・デザート"></option>
            </datalist>
        </div>
        <div class="contents-box">
            <label>商品名</label><br>
            <input name="name" type="text" value=""><br>
        </div>
        <div class="contents-box" style="margin-bottom: 10px;">
            <label>価格</label><br>
            <input name="amount" type="number" value=""><br>
        </div>
        <input name="send" type="submit" value="登録">
    </form>
    <div>
        <p style="color: red;text-align: center;">{{ session('kind') }} {{ session('name') }} {{ session('amount') }}{{ session('flash_message') }}</p>
    </div>
</body>

</html>