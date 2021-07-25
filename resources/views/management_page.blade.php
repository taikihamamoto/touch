<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- <meta http-equiv="refresh" content="2; URL=" {{ route('management_page') }}"> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script>
    // 注文情報をAjaxで取得
        new Vue({
                el: '#app',
                data: {
                    orders: {}
                },
                mounted() {
                    var self = this;
                    var url = '/Ajax/Management';
                    axios.get(url).then(function(response){
                        self.orders = response.data;
                        console.log(self.orders);
                    });
                }
            });
    </script>
    <title>注文ページ</title>
</head>

<body>
<div id="app">
<table>
    <tr v-for="order in orders">
        <td v-text="order.count"></td>
    </tr>
</table>
</div>
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
            @if ( $order->status != "3" && $order->status != "4" )
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
                    @if ( $order->status == "1" )
                    <p style="font-size: 20px;color: red;">調理中</p>
                    @endif
                    @if ( $order->status == "2" )
                    <p style="font-size: 20px;color: green;">配達中</p>
                    @endif
                    @if ( $order->status == "3" )
                    <p style="font-size: 20px;color: blue;">完了済み</p>
                    @endif
                </td>
                <td>
                    @if ( $order->status == "1" )
                    <form method="post" action="{{ route('change_made') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input style="margin:9px 0px;" type="submit" value="調理完了">
                    </form>
                    @endif
                    @if ( $order->status == "2" )
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