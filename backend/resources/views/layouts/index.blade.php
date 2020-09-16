<!Doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-center-circle.min.css" />

    <style>
    #main {width: 100%;padding: 10px 30px 10px 10px; }
    header {background-color:#FFFFEE;}
    .footer {font-size:30px; background-color:#3490dc; text-align:right; color:white; margin:-25px 0;}
    .example {position: relative;}
    .example img { width:99%; max-width:99%; margin: 10px 10px; height: auto;}
    header {width: 100%;padding: 15px 0;margin: 0 auto;text-align: center;}
    header .headline{font-size: 32px;}
    .nav-list {text-align: center;padding: 10px 0;margin: 0 auto;}
    .nav-list-item {list-style: none;display: inline-block;margin: 0 20px;}
    footer {width: 100%; height: 120px; text-align: center; padding: 50px 0;background-color: #00ff7f;}
    .footer-text {color: #fff;}
    .sidebar_fixed {position: sticky;top: 60px;}
    .sidebar_content {margin-bottom: 100px;}
    .myrecipe{color: #4c4c4c; font-weight: bold; text-align: center; margin-top: 24px; padding: 24px 8px; font-size: 1.1em; background-color: #fefefe;}
    img.inrecipe{width:90%; display: block; margin: 0 auto; height: 200px; object-fit: cover;}
    .pace-running .wrap {display:none;}
    .btn {margin:10px 50px;}
    .text{ margin:10px 10px;}
    .recipe{margin:0px auto;}
    </style>

</head>
<body class="is-slide" id="page-animate">
<!-- header -->
<header>
    <h1 class="headline">
        <a>糖質制限商品&レシピ集</a>
    </h1>
    <ul class="nav-list">
        <li class="nav-list-item">
        <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-list-item">
        <a href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-list-item">
        <a href="{{ route('register') }}">Register</a>
        </li>
    </ul>
    </header>
    <main class="mb-auto">
    <div class="container">
        <div class="row" id="content">
            <div class="d-flex flex-row flex-wrap">
                <div class="col-md-9">
                <!-- main -->
                @yield('content')
                </div>
            <div class="col-md-3">
            <!-- sub -->
            @include('layouts.sub')
            </div>
        </div>
    </div>
    </main>
    <!-- footer -->
    <footer>
        <p>© All rights reserved by sugerrecipe.</p>
    </footer>
</body>
</html>