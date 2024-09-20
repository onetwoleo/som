@extends('layouts.welcome_app')
@section('content')
    <body id="page-top" class="index-template">
    <div class="top-slider-wrapper">
        <div class="top-slider">
            <div class="item white" style="background: url(image/slider1.jpg) 50% 50% no-repeat; background-size: cover;" >
                <div class="table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="title">
                                У нас самый вкусный шашлык! Не веришь? <br> Приходи и попробуй!
                            </div>
                            <div class="sup-title">
                    <span class="f16 upper">
                        Смотри - язык не проглоти!
                    </span>
                            </div>
                            <div class="push40"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item white" style="background: url(image/slider2.jpg) 50% 50% no-repeat; background-size: cover;" >
                <div class="table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="title">
                                Встречай лето с новым  <br>меню в "Сомокат"
                            </div>
                            <div class="sup-title">
                    <span class="f16 upper">
                        пиццы много не бывает
                    </span>
                            </div>
                            <div class="push40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    --}}
    <div class="index-products products span3" id="catalog">
        <div class="push40"></div>
        <div class="push30 hidden-xs"></div>
        <div class="container">
            <div class="text-center">

                <ul class="simple-filter">
                    @foreach($types as $type)
                        <li class="filter"  data-filter=".category{{$type->id}}">{{$type->name}}</li>
                    @endforeach
{{--                    <li class="filter active" data-filter=".category1">Шашлыки</li>--}}
{{--                    <li class="filter" data-filter=".category125">Пицца</li>--}}
{{--                    <li class="filter" data-filter=".category120">Вторые блюда</li>--}}
{{--                    <li class="filter" data-filter=".category121">Салаты</li>--}}
{{--                    <li class="filter" data-filter=".category122">Закуски</li>--}}
{{--                    <li class="filter" data-filter=".category124">Напитки</li>--}}
                </ul>

            </div>
            <div class="row">
                @foreach($types as $type)
                @foreach($products as $product)
                @if($product->type->id==$type->id)
                <div class="col-sm-6 col-md-4 mix category{{$product->type->id}} ">
                    <div class="element relative">
                        <a class="absolute" href="/products/{{$product->id}}"></a>
                        <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post" class="ms2_form">
                            @csrf
                            <div class="stickers">
                                @if($product->discount) <div class="sticker-element action">Акция!</div>@endif
                                @if($product->hit==1) <div class="sticker-element hit">Популярное</div>@endif
                                @if($product->new==1) <div class="sticker-element novelty">Новинка</div>@endif
                            </div>
                            <div class="img-wrapper">
                                <div class="table">
                                    <div class="table-cell">
                                        <img src="{{$product->photo}}" alt="{{$product->name}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="element-content relative">
                                <div class="title ttwalls">
                                    <div class="table">
                                        <div class="table-cell">{{$product->name}}</div>
                                    </div>
                                </div>
                                <div class="introtext">{{$product->description}}</div>
                                <div class="push15"></div>
                                <div class="price-wrap">
                                    @if($product->discount)
                                        <span class="old-price strike red f16 light">{{$product->amount}} руб.</span>
                                        <span class="price">{{$product->discount}} руб.</span>
                                    @else
                                        <span class="price">{{$product->amount}} руб.</span>
                                    @endif
                                    <span class="right f14 gray product-weight">Вес: 680 гр.</span>
                                </div>
                                <div class="push10"></div>
                                <div class="row min">
                                    <div class="col-xs-6 element-counter-wrap">
                                        <div class="element-counter">
                                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-number btn-minus" disabled="disabled" data-type="minus" data-field="quantity-{{$product->id}}">-</button>
                                </span>
                                                <input type="text" name="quantity" id="quantity-{{$product->id}}" class="form-control input-number" value="1" data-min="1" data-max="99999999">
                                                <span class="input-group-btn">
                                    <button type="button" class="btn-number btn-plus" data-type="plus" data-field="quantity-{{$product->id}}">+</button>
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 right text-right">
                                        <button class="btn" type="submit" name="ms2_action" value="cart/add">В корзину</button>
                                        <input type="hidden" name="options" value="[]">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
            </div>
        </div>
        <div class="push20"></div>
        <div class="push40 hidden-xs"></div>
    </div>


    <div class="benefits-wrapper">
        <div class="push30"></div>
        <div class="push40 hidden-xs"></div>

        <div class="container">

            <div class="title-h1 text-center">Зуб даём, что у нас:</div>
            <div class="push10"></div>

            <div class="row">

                <div class="col-sm-6 col-md-3">
                    <div class="element text-center">
                        <div class="img-wrapper">
                            <img src="image/benefits/vant1.png" alt="Всегда свежие продукты высокого качества" with="128" height="128" />
                        </div>
                        <div class="title">
                            Всегда свежие продукты <br />высокого качества
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="element text-center">
                        <div class="img-wrapper">
                            <img src="image/benefits/vant2.png" alt="Лучшие повора с многолетним опытом" with="128" height="128" />
                        </div>
                        <div class="title">
                            Лучшие повора <br />с многолетним опытом
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="element text-center">
                        <div class="img-wrapper">
                            <img src="image/benefits/vant3.png" alt="Доставка по городу в течение 60 минут" with="128" height="128" />
                        </div>
                        <div class="title">
                            Доставка по городу <br />в течение 60 минут
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="element text-center">
                        <div class="img-wrapper">
                            <img src="image/benefits/vant4.png" alt="Термоупаковка c набором столовых предметов" with="128" height="128" />
                        </div>
                        <div class="title">
                            Термоупаковка c набором <br>столовых предметов
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="push30"></div>
        <div class="push40 hidden-xs"></div>
    </div>


    {{--    --}}
    <div class="index-text-section" style="background-image: url(image/paralax.jpeg); background-position: 0px 48px;">
        <div class="push40"></div>
        <div class="push40 hidden-xs"></div>
        <div class="container">
            <div class="inner text-center white">

                <div class="title">Для лучшего вкуса и аромата блюд</div>


                <div class="text f20">
                    Мы используем специальные специи,<br> создающие неповторимый вкус
                </div>

            </div>
        </div>
        <div class="push40"></div>
        <div class="push40 hidden-xs"></div>
    </div>




    {{--    --}}
    <div class="about-section" id="about">
        <div class="container">
            <div class="inner hidden visible animated fadeInUp">
                <div class="push60"></div>
                <div class="push20 hidden-xs"></div>

                <div class="row">

                    <div class="col-md-6 hidden-xs hidden-sm text-center">
                        <img src="image/povar2.png">
                    </div>


                    <div class="col-md-6">
                        <h1>Безупречный порядок — залог процветания нашего заведения!</h1>
                        <p><q> Значимость этих проблем настолько очевидна, что новая модель организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений. </q></p>
                        <p>Равным образом новая модель организационной деятельности способствует подготовки и реализации систем массового участия. Таким образом дальнейшее развитие различных форм деятельности требуют от нас анализа направлений прогрессивного развития.</p>
                        <p>С другой стороны дальнейшее развитие различных форм деятельности позволяет выполнять важные задания по разработке модели развития.</p>
                        <br><br><br>
                    </div>
                </div>

                <div class="push80"></div>
            </div>
        </div>
    </div>
    {{----}}
    <div class="map-section">

        <div class="container">
            <div class="contacts hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="item relative">
                            <div class="table">
                                <div class="table-cell">
                                    <div class="inner relative">
                                        <div class="icon"><img src="image/icon-phone.png" alt=""></div>
                                        <div class="txt">
                                            <div><a href="tel:+79010000010">+7 (904) 720-00-10</a></div>
                                            <div><a href="tel:+79270000015">+7 (904) 720-00-10</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="item relative">
                            <div class="table">
                                <div class="table-cell">
                                    <div class="inner relative">
                                        <div class="icon"><img src="image/icon-place.png" alt=""></div>
                                        <div class="txt">
                                            г. Ковылкино
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="item relative">
                            <div class="table">
                                <div class="table-cell">
                                    <div class="inner relative">
                                        <div class="icon"><img src="image/icon-clock.png" alt=""></div>
                                        <div class="txt">c 11:00 - 22:00 Без выходных</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="push60 visible-md visible-lg"></div>
        <div class="push40 visible-xs"></div>
        <div id="mapexMap">
        </div>
    </div>
    <!-- Footer-->
    <footer>
        <div class="footer-wrapper">
            <div class="footer-top white">
                <div class="container">
                    <div class="row min">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="element weight100 f12">
                                        г. Ковылкино
                                        {{--                                        <br><a href="mailto:info@sitename.com" class="footer-email-link">info@sitename.com</a>--}}
                                    </div>
                                    <div class="push10 visible-xs"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="element">
                                        <div class="footer-tel">
                                            <div><a href="tel:+79010000010">+7 (904) 720-00-10</a></div>
                                            <div><a href="tel:+79270000015">+7 (904) 720-00-10</a></div>
                                        </div>
                                    </div>
                                    <div class="push8 visible-xs"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="push5"></div>
                                    <div class="element footer-schedule weight100 f12">
                                        <div class="table-cell">
                                            <div class="element">
                                                <span class="upper bold">Прием заказов:</span> c 11:00 - 22:00 Без выходных
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right-md">
                                <div class="push15 visible-xs visible-sm"></div>
                                <button class="fancyboxModal btn" data-toggle="modal" data-target="#modal_add_message">Написать нам <i class="material-icons">mail_outline</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom f12 weight100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            ©2024. Доставка еды. Сомокат.
                        </div>
                        <div class="col-sm-4 text-right-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection
