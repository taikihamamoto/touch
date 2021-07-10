<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <title>注文ページ</title>
</head>

<body>
<div>
        <h1>あなたの注文情報</h1>
<table>
            <tr>
                <th>商品名</th>
                <th>個数</th>
                <th>状況</th>
            </tr>
            @if(isset( $orders ))
            @foreach( $orders as $order )
            <tr>
                <td>
                    @foreach ( $products as $product )
                    @if ( $product['id'] == $order->product_id )
                    {{ $product['name'] }}
                    @endif
                    @endforeach
                </td>
                <td>{{ $order->count }}</td>
                <td>
                    @if ( $order->status == "creating" )
                    <p style="font-size: 20px;color: red;">調理中</p>
                    @endif
                    @if ( $order->status == "made" )
                    <p style="font-size: 20px;color: green;">配達中</p>
                    @endif
                    @if ( $order->status == "send" )
                    <p style="font-size: 20px;color: blue;">配達済み</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <h3 style="text-align: right;">注文合計金額　{{ $totalfee }}円</h3>
    <form method="post" action="{{ route('change_finish') }}">
        @csrf
        <input type="hidden" name="table_number" value="{{ $table_number }}">
        @foreach($orders as $order)
        <input type="hidden" name="{{ $order['id'] }}" value="{{ $order['id'] }}">
        @endforeach
        <input type="hidden" name="totalfee" value="{{ $totalfee }}">
        <input class="pay_off" type="submit" onclick="return Chk()" value="注文を確定します"><br>
        <div style="text-align: center;">
            <input class="page_back" type="button" onclick="history.back()" value="注文ページに戻ります">
        </div>
    </form>
    @endif
    <p>{{ session('flash_message') }}</p>
</body>

</html>