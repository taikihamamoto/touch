<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>確認ページ</title>
</head>

<body>
    <h1>注文確認画面</h1>
    <table>
        <tr>
            <th>数</th>
            <th>種類</th>
            <th>商品名</th>
            <th>値段</th>
            <th>個数</th>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td>{{ $data['id'] }}</td>
            <td>{{ $data['kind'] }}</td>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['amount'] }}</td>
            <td>{{ $data['count'] }}</td>
        </tr>
        @endforeach
    </table>
    <h3 style="text-align: right;">合計金額　{{ $totalfee }}円</h3>
    <h3>この注文でよろしいですか？</h3>
    <form method="post" action="{{ route('order_register') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <input type="hidden" name="table_number" value="{{ $table_number }}">
        @foreach($datas as $data)
        <input type="hidden" name="{{ $data['product_id'] }}" value="{{ $data['count'] }}">
        @endforeach
        <input class="confirmOkey" type="submit" value="はい、注文を確定します"><br>
    </form>
    <input class="confirmCansel" type="button" onclick="history.back()" value="いいえ、注文ページに戻ります">
</body>

</html>