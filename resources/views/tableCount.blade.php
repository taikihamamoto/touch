<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>テーブル数入力</title>
</head>

<body>
    <form action="{{ route('QRcode_page') }}" method="post">
        @csrf
        <div class="tableCountForm">
            <h2>テーブル数は何席ですか？</h2>
            <p class="Reference_Mark">※テーブルの数だけQRコードが発行されます</p>
            <input type="number" name="tableCount" min="0" value="">
            <input type="submit" name="tableSubmit" value="送信">
        </div>
    </form>
</body>

</html>