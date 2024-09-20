@extends('layouts.welcome_all_app')
@section('content')
    <br><br><br>
    <div class="middle">
    <div class="push50 hidden-xs"></div>
    <div class="push30 visible-xs"></div>
    <div class="container">
        <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post" class="ms2_form">
            @csrf
        <div class="product-detail">
            <h1 class="visible-xs visible-sm">{{$product->name}}</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="product-img-wrapper relative lightgallery" style="background: #f8fafc; padding: 30px;">
                        <a href="{{$product->photo}}" class="lightgallery-link absolute">
                            <div class="table">
                                <div class="table-cell text-center">
                                    <i class="material-icons">zoom_in</i>
                                </div>
                            </div>
                        </a>
                        <img src="{{$product->photo}}" alt="Ассорти свиное" />
                        <div class="stickers">
                            @if($product->discount) <div class="sticker-element action">Акция!</div>@endif
                            @if($product->hit==1) <div class="sticker-element hit">Популярное</div>@endif
                            @if($product->new==1) <div class="sticker-element novelty">Новинка</div>@endif
                        </div>
                    </div>
{{--                    <div class="push15"></div><span class="product-weight">{{$product->weight}} гр.</span><div class="push15"></div>--}}
{{--                    <div class="calories-wrapper">--}}
{{--                        <div class="push15"></div>--}}
{{--                        <span>Белки: 5 гр.</span>--}}
{{--                        <span>Жиры: 15 гр.</span>--}}
{{--                        <span>Углеводы: 22,5 гр.</span>--}}
{{--                        <span>Ккал: 220</span>--}}
{{--                        <div class="push25"></div>--}}
{{--                    </div>--}}

                </div>
                <div class="col-md-6">
                    <div class="product-detail-content">
                        <h1 class="visible-md visible-lg">{{$product->name}}</h1>
                            <div class="introtext f14">{{$product->description}}</div>
                            <hr>
                            <div class="push10"></div>
                            <div class="characteristics">
                                <div class="element">
                                    <span class="black bold">Категория:</span> {{$product->type->name}}
                                    <div class="push10"></div>
                                </div>
                                <div class="element">
                                    <span class="black bold">Вес:</span> {{$product->weight}} гр.
                                    <div class="push10"></div>
                                </div>
                                <div class="element">
                                    <span class="black bold">Стоимость:</span> @if($product->discount)
                                        <span class=""><b>{{$product->discount}}</b> руб.</span>
                                        <span class="old_price strike f14">{{$product->amount}} руб.</span>
                                    @else
                                        <span class=""><b>{{$product->amount}}</b> руб.</span>
                                    @endif
                                    <div class="push10"></div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="push20"></div>
                                    <div class="col-sm-4 col-md-6 col-lg-4">
                                        <div class="element">
                                            <div class="push10"></div>
                                            <div class="element-counter">
                                                <div class="input-group">
                                                    <span class="black bold">Количество:</span>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn-number btn-minus" disabled="disabled" data-type="minus" data-field="quantity-{{$product->id}}">-</button>
                                                    </span>
                                                    <input type="text" name="quantity" id="quantity-{{$product->id}}" class="form-control input-number" value="1" data-min="1" data-max="99999999">
                                                    <span class="input-group-btn">
                                                         <button type="button" class="btn-number btn-plus" data-type="plus" data-field="quantity-{{$product->id}}">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="push20"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-6 col-lg-4">
                                        <div class="price-wrap f26 weight900">@if($product->discount)<span class="price">{{$product->discount}} руб.</span> <span class="old-price strike gray weight100 f16">{{$product->amount}} руб.</span> @else <span class="price">{{$product->amount}} руб.</span> @endif </div>
                                        <div class="push30"></div>
                                    </div>
                                    <div class="col-sm-4 col-md-6 col-lg-4">
                                        <button type="submit" class="btn big block" name="ms2_action" value="cart/add">В корзину</button>
                                    </div>
                                </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    <div class="push200"></div>
    <div class="footer-push"></div>
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
    </body>
{{--    @include('admin.modal_update_product')--}}
@endsection
