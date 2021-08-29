<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
    <title>注文ページ</title>
</head>

<body>
    @foreach ( $qrcode_datas as $qrcode_data )
    <div class="plan-item" style="padding: 10px;">
        <h4>{{ $qrcode_data['count'] }}</h4>
        <a href="{{ $qrcode_data['url'] }}">QRコードのページはこちら</a>
        <br>
        {!! $qrcode_data['qrcode_image_tag'] !!}
    </div>
    @endforeach
        <button><a class="" href="">QRコードの印刷</a></button>
    <button type="button" onclick="location.href='tableCountUp'" class="btn btn-reserve">テーブル数変更</button>
        <br>
    <h3><a class="home_back" href="/">ここを押してホームへ戻ります</a></h3>
</body>

</html>
