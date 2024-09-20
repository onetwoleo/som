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
    <script src="{{ asset('js/jquery.mixitup.min.js') }}" defer></script>
    <script src="{{ asset('slick/slick.min.js') }}" defer></script>
    <script src="{{ asset('js/lightgallery-all.min.js') }}" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?load=package.full&lang=ru-RU" type="text/javascript" defer></script>
    <script src="{{ asset('js/map.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
{{--    <script src="{{ asset('js/onReady.js') }}" defer></script>--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styless.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">--}}
    <!-- Bootstrap Icons-->
    <link href="{{ asset('icons-1.8.1/font/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div id="app">
    <!-- Navigation-->
    <nav class="navbar  navbar-expand-lg fixed-top py-3 header" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); background-color: #fff;">
        <div class="container">
{{--            <div class="logo">--}}
{{--                <div class="table">--}}
{{--                    <div class="table-cell">--}}
{{--                        <a href="{{ url('/') }}">--}}
{{--                            <img src="/image/logo.png" alt="Доставка еды.">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <a class="navbar-brand" href="{{ url('/') }}">Доставка еды "СОМОКАТ"</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-nav-t ms-auto my-2 my-lg-0">
                    <li class="nav-item" id="nav-link-menu"><a class="nav-link" href="{{url('/#catalog')}}">Меню</a></li>
                    <li class="nav-item" id="nav-link-about"><a class="nav-link" href="{{url('/about')}}">О нас</a></li>
                    <li class="nav-item" id="nav-link-contact"><a class="nav-link" href="{{url('/contact')}}">Контакты</a></li>
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
        @yield('content')
    </main>
</div>

<div class="modal fade" id="modal_add_message" tabindex="-1" role="dialog" aria-labelledby="store_ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store_ModalLabel">Оставить сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('store_message') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fio" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label text-md-right">Сообщение</label>

                        <div class="col-md-6">
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus>
                            </textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-md btn-outline-success" type="submit">Отправить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@include('admin.modal_store_message')

</body>
</html>
