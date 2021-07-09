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
    <h1 style="color: red;text-align: center;">注文登録できたよ！</h1>
    <h3 style="text-align: center;">注文が届くまで待っててね</h3>
    <div class="total">
        <form method="post" action="{{ route('total_page') }}">
            @csrf
            <input type="hidden" name="table_number" value="{{ $table_number }}">
            <input type="submit" value="現在の注文状況">
            <div style="text-align: center;margin-top: 40px;">
                <input class="page_back" type="button" onclick="location.href='http://localhost:8888/order_page/table={{ $table_number }}&user_id={{$user_id}}'" value="注文ページに戻ります">
            </div>
        </form>
    </div>
</body>

</html>