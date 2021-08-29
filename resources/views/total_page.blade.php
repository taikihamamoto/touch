<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
=======
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/Total_page.js') }}"></script>
>>>>>>> 314e53c9b4fd36f2d235c9e0de224a1d04f00076
    <title>注文ページ</title>
</head>

<body>
    <div>
        <h1>あなたの注文情報</h1>
        <table id="rarara">
        </table>
    </div>
    <h3 style="text-align: right;">注文合計金額　<span id="total_amount"></span>円</h3>
    <form method="post" action="{{ route('change_finish') }}">
        @csrf
        <input type="hidden" name="table_number" value="{{ $table_number }}">
        @foreach($orders as $order)
        <input type="hidden" name="{{ $order['id'] }}" value="{{ $order['id'] }}">
        @endforeach
        <input id="POST_total_amount" type="hidden" name="totalfee" value="">
        <input class="pay_off" type="submit" onclick="return Chk()" value="注文を確定します"><br>
        <div style="text-align: center;">
            <input class="page_back" type="button" onclick="history.back()" value="注文ページに戻ります">
        </div>
    </form>
    <p>{{ session('flash_message') }}</p>
</body>

</html>