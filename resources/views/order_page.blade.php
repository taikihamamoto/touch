<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>注文ページ</title>
</head>

<body>
    <form method="post" action="{{ route('confirm_page') }}">
        @csrf
        <input type="hidden" name="table_number" value="{{ $table_number }}">
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <div class="tab-wrap">
            <div class="tab-wrap">
                <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">にぎり</label>
                <div class="tab-content">
                    @foreach($products as $product)
                    @if ($product->kind == "にぎり")
                    <ul class="plan-content">
                        <div class="plan-div">
                            <li class="plan-item">
                                <h4 class="plan-title">{{ $product->name }}</h4>
                                <p style="padding-top: 5px;padding-left: 20px;">{{ $product->amount }}円</p>
                                <p style="padding-top: 5px;padding-left: 20px;">個数：</p>
                                <input id="count" class="order_post" type="number" name="{{ $product->id }}" min="0" value="0">
                            </li>
                        </div>
                    </ul>
                    @endif
                    @endforeach
                </div>
            </div>
            <input id="TAB-02" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-02">軍艦巻き</label>
            <div class="tab-content">
                @foreach($products as $product)
                @if ($product->kind == "軍艦巻き")
                <ul class="plan-content">
                    <div class="plan-div">
                        <li class="plan-item">
                            <h4 class="plan-title">{{ $product->name }}</h4>
                            <p style="padding-top: 5px;padding-left: 20px;">{{ $product->amount }}円</p>
                            <p style="padding-top: 5px;padding-left: 20px;">個数：</p>
                            <input id="" class="order_post" type="number" name="{{ $product->id }}" min="0" value="0">
                        </li>
                    </div>
                </ul>
                @endif
                @endforeach
            </div>
            <input id="TAB-03" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-03">汁物・デザート</label>
            <div class="tab-content">
            @foreach($products as $product)
            @if ($product->kind == "汁物・デザート")
            <ul class="plan-content">
                <div class="plan-div">
                    <li class="plan-item">
                        <h4 class="plan-title">{{ $product->name }}</h4>
                        <p style="padding-top: 5px;padding-left: 20px;">{{ $product->amount }}円</p>
                        <p style="padding-top: 5px;padding-left: 20px;">個数：</p>
                        <input id="" class="order_post" type="number" name="{{ $product->id }}" min="0" value="0">
                    </li>
                </div>
            </ul>
            @endif
            @endforeach
        </div>
    </div>
    <input class="confirmSubmit" type="submit" name="confirmSubmit" value="注文確認画面へ">
</form>
<p style="color: red;text-align: center;">{{ session('flash_message') }}</p>
<div class="total">
        <form method="post" action="{{ route('total_page') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <input type="hidden" name="table_number" value="{{ $table_number }}">
            <input type="submit" value="現在の注文状況">
        </form>
    </div>
</body>

</html>