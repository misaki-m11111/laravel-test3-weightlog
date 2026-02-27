@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/weight_logs/index.css') }}">
@endsection

@section('content')
    <div class="weight">
        <div class="summary">
            <div class="summary__item">
                <p class="summary__label">目標体重</p>
                <p class="summary__value">
                    {{ $target?->target_weight ?? '--' }}
                    <span>kg</span>
                </p>
            </div>

            <div class="summary__item">
                <p class="summary__label">目標まで</p>
                <p class="summary__value">
                    @php
                        $current = $weightLogs->first()?->weight ?? 0;
                        $goal = $target?->target_weight ?? 0;
                        $diff = $goal - $current;
                    @endphp

                    {{ number_format($diff, 1) }}
                    <span>kg</span>
                </p>
            </div>

            <div class="summary__item">
                <p class="summary__label">最新体重</p>
                <p class="summary__value">
                    {{ $current ?? '--' }}
                    <span>kg</span>
                </p>
            </div>

        </div>

        <div class="table-area">
            <div class="table-header">
                <div class="left-area">
                    <form method="POST" action="/weight_logs/search" class="search-form">
                        @csrf
                        <input type="date" name="from" value="{{ request('from') }}">
                        <span>〜</span>
                        <input type="date" name="to" value="{{ request('to') }}">
                        <button type="submit" class="search-btn">検索</button>
                    </form>

                    @if (request('from') || request('to'))
                        <a href="/weight_logs" class="reset-btn">リセット</a>
                    @endif
                </div>

                <a href="/weight_logs/create" class="btn-add">データ追加</a>
            </div>

            @if (request('from') && request('to'))
                <div class="search-result">
                    {{ request('from') }} ～ {{ request('to') }}の結果 {{ $count }} 件
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>摂取カロリー</th>
                        <th>運動時間</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weightLogs as $log)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}
                            </td>

                            <td>
                                {{ number_format($log->weight, 1) }}kg
                            </td>

                            <td>
                                {{ $log->calories ? number_format($log->calories) . 'kcal' : '-' }}
                            </td>

                            <td>
                                @if ($log->exercise_time)
                                    {{ \Carbon\Carbon::parse($log->exercise_time)->format('H:i') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                <a href="/weight_logs/{{ $log->id }}">✏</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination">
        {{ $weightLogs->links('pagination::default') }}
    </div>
@endsection
