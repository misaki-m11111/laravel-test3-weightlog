@extends('layouts.auth')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
    <div class="auth auth--login">
        <h2 class="page__logo">PiGLy</h1>
            <h3 class="page__title">ログイン</h3>
            <form method="POST" action="/login">
                @csrf
                <div class="form login-form">
                    <div class="form__group">
                        <label class="form__label">メールアドレス</label>
                        <input class="form__input" type="text" name="email" value="{{ old('email') }}"
                            placeholder="メールアドレスを入力">

                        @error('email')
                            <p class="form__error">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form__group">
                        <label class="form__label">パスワード</label>
                        <input class="form__input" type="password" name="password" placeholder="パスワードを入力">

                        @error('password')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="auth__button auth__button--login">
                    ログイン
                </button>
            </form>

            <a href="/register/step1" class="auth__link">アカウント作成はこちら</a>
    </div>
@endsection
