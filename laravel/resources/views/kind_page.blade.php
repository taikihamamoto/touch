<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/style.css') }}">
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/Kind_page.js"></script>
>>>>>>> 314e53c9b4fd36f2d235c9e0de224a1d04f00076
    <title>注文ページ</title>
</head>

<body>
    <ul style="color: red;">
        @if ($errors->has('name'))
        <li>{{ $errors->first('name') }}</li>
        @endif
    </ul>
    <h1>種類登録</h1>
    <table>
        <tr>
            <th></th>
            <th>種類名</th>
            <th>変更</th>
        </tr>
        @if(isset( $kinds ))
        @foreach( $kinds as $kind )
        <tr>
            <td>{{ $kind['line_count'] }}</td>
            <td>{{ $kind['name'] }}</td>
            <td>
                <div class="content">
                    <button class="js-modal-open" data-target="modal{{ $kind['id'] }}">クリックでモーダルを表示</button>
                </div>
            </td>
            <div id="modal{{ $kind['id'] }}" class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <p>種類名：{{ $kind['name'] }}</p>
                    <div class="modal_change_post"></div>
                    <button class="js-product-change" value="{{ $kind['id'] }}">変更</button>
                    <button class="js-product-delete" value="{{ $kind['id'] }}">消去</button>
                    <button class="js-modal-close" value="{{ $kind['id'] }}">閉じる</button>
                </div><!--modal__inner-->
            </div><!--modal-->
            @endforeach
            @endif
        </tr>
    </table>
    <form action="{{ route('kind_store') }}" method="post">
        @csrf
        <div class="contents-box">
        </div>
        <div class="contents-box">
            <label>種類名</label><br>
            <input name="name" type="text" autocomplete="off" value=""><br>
        </div>
        <input name="send" type="submit" value="登録">
    </form>
    @if(Session::has('name'))
    <div>
        <p style="color: red;text-align: center;">種類に<span class="sessionMark">【{{ session('name') }}】</span>の欄を追加しました</p>
    </div>
    @endif
</body>

</html>
