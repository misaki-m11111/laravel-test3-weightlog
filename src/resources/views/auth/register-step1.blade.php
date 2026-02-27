@extends('layouts.auth')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
    <div class="auth auth--register">
        <h2 class="page__logo">PiGLy</h2>
        <h3 class="page__title">新規会員登録</h3>
        <h4 class="page__step">STEP1 アカウント情報の登録</h4>

        <form method="POST" action="/register/step1">
            @csrf
            <div class="form register-form">
                <div class="form__group">
                    <label class="form__label">お名前</label>
                    <input class="form__input" type="text" name="name" value="{{ old('name') }}"
                        placeholder="名前を入力">

                    @error('name')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>

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
                    <input class="form__input" type="password" name="password" placeholder="パスワード">

                    @error('password')
                        <p class="form__error">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <button type="submit" class="auth__button auth__button--next">
                次へすすむ
            </button>

        </form>

        <a href="/login" class="auth__link">ログインはこちら</a>
    </div>
@endsection
