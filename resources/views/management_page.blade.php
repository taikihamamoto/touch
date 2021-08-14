<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/Management_page.js"></script>

    <title>注文ページ</title>
</head>

<body>
    <div>
        <table id="rarara">
        </table>
        <p>混み具合<meter id="order_count" value="0" min="0" max="30" low="10" high="20" optimum="30">Vote</meter></p>
    </div>
    <h2 id="Note">
</h2>
</body>

</html>