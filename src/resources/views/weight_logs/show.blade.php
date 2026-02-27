@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/weight_logs/show.css') }}">
@endsection

@section('content')
    <div class="form-area">
        <h2>Weight Log</h2>

        <form method="POST" action="/weight_logs/{{ $weightLog->id }}/update">
            @csrf
            @method('put')

            <div class="form-group">
                <div class="label-row">
                    <label>日付</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-wrap">
                    <input type="date" name="date" value="{{ old('date', $weightLog->date) }}">
                </div>

                @error('date')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label>体重</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-row">
                    <input type="text" name="weight" value="{{ old('weight', $weightLog->weight) }}" placeholder="50.0">
                    <span class="unit-out">kg</span>
                </div>

                @error('weight')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label>摂取カロリー</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-row">
                    <input type="text" name="calories" value="{{ old('calories', $weightLog->calories) }}"
                        placeholder="1200">
                    <span class="unit-out">cal</span>
                </div>

                @error('calories')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label>運動時間</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-wrap">
                    <input type="time" name="exercise_time"
                        value="{{ old('exercise_time', $weightLog->exercise_time) }}">
                </div>

                @error('exercise_time')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label>運動内容</label>
                    <span class="required">必須</span>
                </div>
                <div class="input-wrap">
                    <input type="text" name="exercise_content"
                        value="{{ old('exercise_content', $weightLog->exercise_content) }}" placeholder="運動内容を追加">
                </div>

                @error('exercise_content')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="update__actions">
                <a href="/weight_logs" class="show__btn show__btn-back">戻る</a>
                <button type="submit" class="show__btn show__btn-update">更新</button>
            </div>
        </form>

        <div class="delete-area">
            <form method="POST" action="/weight_logs/{{ $weightLog->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="show__btn-delete">🗑</button>
            </form>
        </div>

    </div>
@endsection
