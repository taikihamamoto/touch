@extends('layouts.layout')
@section('title', 'ログイン画面')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <div class="name-input">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="名前">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="email-input">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="password-input">
                    <i class="fas fa-key"></i>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="password-input">
                    <i class="fas fa-key"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="パスワード確認">
                </div>
            </div>
            <div class="btn-outer create">
                <button type="submit" class="btn btn-primary">
                    {{ __('アカウントを登録する') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('button')
    <div class="or-btn-box">
        <div class="box-text">
            <p>登録済みの方は</p>
        </div>
        <div class="btn-outer login">
            <button class="btn btn-primary">
                <a href="{{ route('login') }}">
                    <p>ログイン画面へ</p>
                </a>
            </button>
        </div>
    </div>
@endsection
