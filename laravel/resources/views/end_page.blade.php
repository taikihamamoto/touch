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
    <h1 style="text-align: center;">注文が確定しました。</h1>
    <h2 style="text-align: center;">合計金額は<span style="color: red;">{{ $totalfee }}</span>円です。</h2>
    <h2 style="text-align: center;">レジへお向かいください。</h2>
</body>

</html>