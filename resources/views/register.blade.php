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
    <table>
        <tr>
            <th></th>
            <th>種類名</th>
            <th>商品名</th>
            <th>価格</th>
        </tr>
        @if(isset( $products ))
        @foreach( $products as $product )
        <tr>
            <td>{{ $product['line_count'] }}</td>
            <td>{{ $product['kind_name'] }}</td>
            <td>{{ $product['product_name'] }}</td>
            <td>{{ $product['amount'] }}</td>
            @endforeach
            @endif
        </tr>
    </table>
    <form action="{{ route('product_store') }}" method="post">
        @csrf
        <div class="contents-box">
            <label>種類</label><br>
            <input name="kind" type="text" list="kind_example" autocomplete="off"><br>
            <datalist id="kind_example">
                @foreach ( $kinds as $kind )
                <option value="{{ $kind->name }}"></option>
                @endforeach
            </datalist>
        </div>
        <div class="contents-box">
            <label>商品名</label><br>
            <input name="name" type="text" autocomplete="off" value=""><br>
        </div>
        <div class="contents-box" style="margin-bottom: 10px;">
            <label>価格</label><br>
            <input name="amount" type="number" autocomplete="off" value=""><br>
        </div>
        <input name="send" type="submit" value="登録">
    </form>
    @if(Session::has('name'))
    <div>
        <p style="color: red;text-align: center;"><span class="sessionMark">【{{ session('kind') }}】 【{{ session('name') }}】 【{{ session('amount') }}円】</span> の登録が完了しました</p>
    </div>
    @endif
</body>

</html>