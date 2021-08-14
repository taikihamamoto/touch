<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <meta http-equiv="refresh" content="2; URL="{{ route('management_page') }}">
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('3fc3de1d0c459022d835', {
            cluster: 'ap3'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
    <title>注文ページ</title>
</head>

<body>
    <div>
        <table>
            <tr>
                <th>テーブル</th>
                <th>商品名</th>
                <th>個数</th>
                <th>状況</th>
                <th>次ステップ</th>
            </tr>
            @foreach( $orders as $order )
            @if ( $order->status != "send" && $order->status != "finished" )
            <tr>
                <td>{{ $order->table_number }}</td>
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
                    <p style="font-size: 20px;color: blue;">完了済み</p>
                    @endif
                </td>
                <td>
                    @if ( $order->status == "creating" )
                    <form method="post" action="{{ route('change_made') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input style="margin:9px 0px;" type="submit" value="調理完了">
                    </form>
                    @endif
                    @if ( $order->status == "made" )
                    <form method="post" action="{{ route('change_send') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input style="margin:9px 0px;" type="submit" value="配達完了">
                    </form>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>