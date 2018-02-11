{{--<!DOCTYPE html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--&nbsp;--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--@yield('content')--}}
    {{--</div>--}}

    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="/css/css.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
</head>
<body>
<!-- header -->
<header>
    <div class="header_top">
        <div class="container">
            <ul class="header_top_menu fr">
                @guest
                    <li><a href="{{url('/redirect')}}">로그인</a></li>

                @else
                    <li><a href="{{ route('goods.create') }}">등록하기</a></li>
                    <li><a href="{{ route('user.show' , ['users' => Auth::id()]) }}">마이페이지</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    로그아웃
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <div class="header_bottom pr">
        <div class="container h">
            <div class="col-2 h col-clear">
                <div class="menu_btn">
                    <div class="col-12 col-clear">
                        <img src="/img/menubar.png" alt="menu_bar">
                        <div>카테고리</div>
                    </div>
                </div>
                <div class="drop_menu">
                    <ul>
                        <li><a href="/goods/category/1">의류</a></li>
                        <li><a href="/goods/category/2">도서</a></li>
                        <li><a href="/goods/category/3">생활/가전</a></li>
                        <li><a href="/goods/category/4">학용품</a></li>
                        <li><a href="/goods/category/5">음식</a></li>
                        <li><a href="/goods/category/6">전자</a></li>
                        <li><a href="/goods/category/7">기타</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-10 h">
                <div class="col-12 col-clear h">
                    <div class="logo col-2 col-clear" onclick="location.href = '/'">
                        <img src="/img/logo.png" alt="logo">
                    </div>
                    <div class="search col-10 col-clear">
                        <form action="/goods/search" class="h">
                            <div class="search_box h">
                                <div class="col-11 col-clear h"><input type="text" name="keyword"></div>
                                <div class="col-1 col-clear h">
                                    <button type="submit">
                                        <img src="/img/search.png" alt="search_btn">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end of header -->

@yield('content')

<!-- footer -->
<footer>
    Copyright© 2018 Highthon2 ALL RIGHTS RESERVED
</footer>
<!-- end of footer -->

<script>
    $(function(){
        $(".menu_btn").on("click",function(){
            $(".drop_menu").hasClass("clicked") ? $(".drop_menu").addClass("clicked").fadeOut() : $(".drop_menu").addClass("clicked").fadeIn();
        });
    });
</script>
@stack('scripts')
</body>
</html>