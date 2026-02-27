<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">

    @yield('style')

    <title>PiGly</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">PiGLy</h1>
        </div>

        <nav class="header__nav">
            <a href="/weight_logs/goal_setting" class="header__link">目標体重設定</a>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="header__button">ログアウト</button>
            </form>
        </nav>
    </header>

    @yield('content')

</body>

</html>
