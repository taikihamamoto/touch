@extends('layouts.auth')
@section('title', 'ログイン画面')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="email-input">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="" name="email" placeholder="メールアドレス" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <div class="invalid-box">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="password-input">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="パスワード" required autocomplete="current-password">
                    @error('password')
                    <div class="invalid-box">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
            <div class="btn-outer login">
                <button type="submit" class="btn btn-primary">
                    {{ __('ログインする') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('button')
    <div class="or-btn-box">
        <div class="box-text">
            <p>新規の方は</p>
        </div>
        <div class="btn-outer create">
            <button class="btn btn-primary">
                <a href="{{ route('register') }}">
                    <p>アカウントを作成</p>
                </a>
            </button>
        </div>
    </div>
@endsection