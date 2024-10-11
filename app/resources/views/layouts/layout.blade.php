<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ECサイト') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Custom Styles -->
    <style>
        .navbar {
            background: linear-gradient(to right, #b3c7e6, #e6f0ff); /* 薄いグラデーション背景色 */
        }
        
        .navbar .navbar-brand, .navbar .my-navbar-item {
            color: #333; /* テキストカラーをダークグレーに変更 */
        }

        .navbar .my-navbar-item:hover {
            color: #ffdd57; /* ホバー時の色を変更 */
        }

        .my-navbar-control {
            text-align: right; /* 右寄せにする */
            padding-right: 15px; /* 右側に少し余白を持たせる */
        }

        .my-navbar-item {
            margin-left: 10px; /* 各リンクや要素の間にスペースを追加 */
        }

        /* サイト名（左上に配置）のスタイル */
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        /* ボタンのデザインも調整可能です */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- サイト名（左上に表示） -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-shopping-cart"></i> ECサイト
                </a>

                <div class="collapse navbar-collapse">
                    <div class="my-navbar-control ml-auto"> <!-- ml-autoを追加 -->
                        @if(Auth::check())
                            <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                            /
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary my-navbar-item">
                                    {{ __('ログアウト') }}
                                </button>
                            </form>
                        @else
                            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                            /
                            <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>
</body>
</html>
