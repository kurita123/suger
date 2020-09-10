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
    <link href="{{ asset('css/hosi.css') }}" rel="stylesheet">

    <style>
    header {background-color:#FFFFEE;}
    .footer {font-size:30px; background-color:#3490dc; text-align:right; color:white; margin:-25px 0;}
    header {width: 100%;padding: 15px 0;margin: 0 auto;text-align: center;}
    header .headline{font-size: 32px;}
    .nav-list {text-align: center;padding: 10px 0;margin: 0 auto;}
    .nav-list-item {list-style: none;display: inline-block;margin: 0 20px;}
    footer {width: 100%; height: 120px; text-align: center; padding: 50px 0;background-color: #00ff7f;}
    .footer-text {color: #fff;}
    .recipe {font-weight: bold; text-align: center; margin:0 auto;font-size: 1.1em;}
    .recipe input{width:70%;text-align: center;}
    textarea{width:70%;}
    img.inrecipe{width:50%; display: block; margin: 0 auto; height: auto; object-fit: cover;}
    p {margin:20px 0 0 0;}
    .myrecipe{color: #4c4c4c; font-weight: bold; text-align: center; margin-top: 24px; padding: 24px 8px; font-size: 1.1em; background-color: #fefefe;}
    .name {text-align:center; font-size:2em; margin:20px 0px;}
    .text{ margin:0 10px;}
    .sidebar_fixed {position: sticky;top: 60px;}
    .sidebar_content {margin-bottom: 100px;}
    .span {color:red;}
    .myrecipe-coo{font-size: 1.8em;}
    .myrecipe-su{color: #4c4c4c; font-weight: bold; text-align: left; padding: 24px 8px; font-size: 1.1em; background-color: #fefefe;}
    .button {margin:10px 0px 0px 350px;}
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
        <a href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-list-item">
        <a href="{{ route('register') }}">Register</a>
        </li>
    </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </li>
    </ul>
    </header>
    <div class="content">
        @yield('content')　
    </div>
    <!-- footer -->
    <footer>
        <p>© All rights reserved by sugerrecipe.</p>
    </footer>
</body>
</html>