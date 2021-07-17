<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <!-- font awesame -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <!-- liginform.css -->
    <link rel='stylesheet' href="{{ asset('css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="outer-frame">
            <div class="app-logo"><h1><img src="{{ asset('images/logo.png') }}" alt=""></h1></div>
            @yield('content')
        </div>
        @yield('button')
    </div>
</body>