@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/goal_settings.css') }}">
@endsection

@section('content')
    <div class="goal">
        <div class="goal__card">
            <h2 class="goal__title">目標体重設定</h2>

            <form method="POST" action="/weight_logs/goal_setting">
                @csrf
                @method('PUT')

                <div class="goal__field">
                    <div class="goal__inputWrap">
                        <input class="goal__input" type="text" name="target_weight"
                            value="{{ old('target_weight', $weightTarget->target_weight ?? '') }}" step="0.1">
                        <span class="goal__unit">kg</span>
                    </div>

                    @error('weight')
                        <p class="goal__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="goal__actions">
                    <a href="/weight_logs" class="goal__btn goal__btn--back">戻る</a>
                    <button type="submit" class="goal__btn goal__btn--update">更新</button>
                </div>
            </form>
        </div>
    </div>
@endsection
