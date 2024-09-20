<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Сомокат') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}" defer></script>
{{--    <script src="{{ asset('js/jquery.min.js') }}" defer></script>--}}
    <script src="{{ asset('js/jquery.mixitup.min.js') }}" defer></script>
{{--    <script src="{{ asset('js/owl.carousel.js') }}" defer></script>--}}
    <script src="{{ asset('slick/slick.min.js') }}" defer></script>
    <script src="{{ asset('js/lightgallery-all.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
{{--    <script src="{{ asset('js/onReady.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/styless.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightgallery.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/jquery.jgrowl.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/ms.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar  navbar-expand-lg fixed-top py-3 header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); background-color: #fff;">
            <div class="container">
                {{--            <div class="logo">--}}
                {{--                <div class="table">--}}
                {{--                    <div class="table-cell">--}}
                {{--                        <a href="{{ url('/') }}">--}}
                {{--                            <img src="/image/logo1.jpg" alt="Доставка еды." style="height: 100px; width: 80px;">--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <a class="navbar-brand invert" href="{{ url('/') }}">Доставка еды "СОМОКАТ"</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-nav-t ms-auto my-2 my-lg-0">
                        <li class="nav-item" id="nav-link-menu"><a class="nav-link" href="{{url('/#catalog')}}">Меню</a></li>
                        <li class="nav-item" id="nav-link-about"><a class="nav-link" href="{{url('/about')}}">О нас</a></li>
                        <li class="nav-item" id="nav-link-contact"><a class="nav-link" href="{{url('/contact')}}">Контакты</a></li>
{{--                        @auth(is_admin)--}}
{{--                            <li class="nav-item" id="nav-link-messages"><a class="nav-link" href="{{url('/admin/messages')}}">Сообщения</a></li>--}}
{{--                        @endauth--}}
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{--                        <li class="nav-item">--}}
                            {{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Авторизация') }}</a>--}}
                            {{--                        </li>--}}
                            {{--                        @if (Route::has('register'))--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>--}}
                            {{--                            </li>--}}
                            {{--                        @endif--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle nick" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(Auth::user()->is_admin)
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        {{ __('Админ панель') }}
                                    </a>
                                        <a class="dropdown-item" href="{{ route('messages') }}">
                                            {{ __('Сообщения') }}
                                        </a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <a class="navbar-text" href="{{url('/basket/index')}}">
                        <div class="header-cart">
                            <i class="material-icons">shopping_cart</i>
                            @php
                                $basket_id = request()->cookie('basket_id');
                                        if (!empty($basket_id)) {
                                            $basket_products = \App\Models\Basket::find($basket_id)->products;
                                        }
                            @endphp
                            @if(! empty($basket_products))
                                @php
                                    $cost = 0;
                                @endphp
                                @foreach($basket_products as $basket_product)
                                    @php
                                        $itemQuantity =  $basket_product->pivot->quantity;
                                        $cost = $cost + $itemQuantity;
                                    @endphp
                                @endforeach
                                <span>{{$cost}}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </nav>

        <main class="" id="main">
            <div class="push100"></div>
            <div class="push50"></div>
            @yield('content')
        </main>
    </div>
    @include('admin.modal_store_message')

</body>
</html>
