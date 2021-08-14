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
    @foreach ( $QRcodeData as $QRcodeData )
    <div class="plan-item">
        <h4>{{ $QRcodeData['count'] }}</h4>
        <!-- <a href="{{ $QRcodeData['url'] }}">QRコードのページはこちら</a> -->
        <br>
        {{ $QRcodeData['QRcodePicture'] }}
    </div>
    @endforeach
        <button><a class="" href="">QRコードを画像として保存</a></button>
        <button><a class="" href="">QRコードの印刷</a></button>
        <h3><a class="home_back" href="/">ここを押してホームへ戻ります</a></h3>
</body>

</html>