@extends('layouts.auth')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
    <div class="auth auth--register">
        <h2 class="page__logo">PiGLy</h2>
        <h3 class="page__title">新規会員登録</h3>
        <h4 class="page__step">STEP2 体重データの入力</h4>

        <form method="POST" action="/register/step2">
            @csrf
            <div class="form register-form">
                <div class="form__group">
                    <label class="form__label">現在の体重</label>
                    <input class="form__input" type="text" name="weight" value="{{ old('weight') }}"
                        placeholder="現在の体重を入力">

                    @error('weight')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form__group">
                    <label class="form__label">目標の体重を入力</label>
                    <input class="form__input" type="text" name="target_weight" value="{{ old('target_weight') }}"
                        placeholder="目標の体重を入力">

                    @error('target_weight')
                        <p class="form__error">{{ $message }}</p>
                    @enderror

                </div>

            </div>

            <button type="submit" class="auth__button auth__button--create">
                アカウント作成
            </button>
        </form>

        <a href="/register/step1" class="auth__link">アカウント作成はこちら</a>
    </div>
@endsection
