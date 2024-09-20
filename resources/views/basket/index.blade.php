@extends('layouts.app')

@section('content')

    <div class="middle">
        <div class="push50"></div>
        <div class="push50"></div>
        <div class="container">
            <div class="mini-container">
                <h1>Продукты</h1>
                @if (count($products))
                    @php
                        $basketCost = 0;
                    @endphp

                <div class="content">
                    <div class="cart-body" id="msCart">
                        @if (count($products))
                            @php
                                $basketCost = 0;
                                $cost = 0;
                            @endphp
                            @foreach($products as $product)
                                @php
                                    if ($product->discount){
                                        $itemPrice = $product->discount;
                                    }
                                    else {
                                        $itemPrice = $product->amount;
                                    }
                                        $itemQuantity =  $product->pivot->quantity;
                                        $cost = $cost + $itemQuantity;
                                        $itemCost = $itemPrice * $itemQuantity;
                                        $basketCost = $basketCost + $itemCost;
                                @endphp
                                <div class="element">
                                    <form action="{{ route('basket.remove', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        <button class="element-delete" title="Удалить"><i class="material-icons">close</i></button>
                                    </form>
{{--                                    <a data-toggle="modal" data-target="#modal_update_product" data-content="{{ json_encode($product,TRUE)}}" href="#">--}}
{{--                                        <button class="element-update" title="Редактировать"><i class="material-icons">settings</i></button>--}}
{{--                                    </a>--}}
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="subelement2 relative">
                                                <div class="element-img relative" style="background: url({{$product->photo}}) 50% 50% no-repeat; background-size: contain;">
                                                    <a href="/products/{{$product->id}}" class="absolute"></a>
                                                </div>
                                                <div class="text">
                                                    <div class="table">
                                                        <div class="table-cell">
                                                            <div class="title-h4"><a href="admin/products/{{$product->id}}" class="decoration-none">{{$product->name}}</a></div>
                                                            <div class="introtext f14 gray">{{$product->description}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="push20 visible-xs"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="subelement1 relative">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center-sm">
                                                        <div class="element-price">
                                                            <div class="table">
                                                                <div class="table-cell">
                                                                    @if($product->discount)
                                                                        <span class="black f20"><b>{{$product->discount}}</b> руб.</span>
                                                                        <span class="old_price strike f14">{{$product->amount}} руб.</span>
                                                                    @else
                                                                        <span class="black f20"><b>{{$product->amount}}</b> руб.</span>
                                                                    @endif
                                                                    <br>
                                                                    <span class="gray f14">Вес: {{$product->weight}} гр.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 text-right-xs text-left-sm text-center-md">
                                                        <div class="element-counter" style="height:  100px;">
                                                            <div class="table">
                                                                <div class="table-cell">

{{--                                                                    <span class="input-group-btn">--}}
{{--                                                                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"--}}
{{--                                                                              method="post" class="d-inline">--}}
{{--                                                                            @csrf--}}
{{--                                                                            <button type="button" class="btn-number btn-minus" disabled="disabled" data-type="minus" data-field="quantity-{{$product->id}}">-</button>--}}
{{--                                                                        </form>--}}
{{--                                                                    </span>--}}
{{--                                                                    <span class="mx-1">{{ $itemQuantity }}</span>--}}
{{--                                                                    <input type="text" name="quantity" id="quantity-{{$product->id}}" class="form-control input-number" value="1" data-min="1" data-max="99999999">--}}
{{--                                                                    <span class="input-group-btn">--}}
{{--                                                                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"--}}
{{--                                                                              method="post" class="d-inline">--}}
{{--                                                                            @csrf--}}
{{--                                                                            <button type="button" class="btn-number btn-plus" data-type="plus" data-field="quantity-{{$product->id}}">+</button>--}}
{{--                                                                        </form>--}}
{{--                                                                    </span>--}}




                                                                    <div class="input-group">
                                                                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                                                                              method="post" class="d-inline">
                                                                            @csrf
                                                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                                                <i class="material-icons">remove</i>
{{--                                                                                <i class="fas fa-minus-square"></i>--}}
                                                                            </button>
                                                                        </form>
                                                                        <span class="mx-1">{{ $itemQuantity }}</span>
                                                                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                                                                              method="post" class="d-inline">
                                                                            @csrf
                                                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                                                <i class="material-icons">add</i>
{{--                                                                                <i class="fas fa-plus-square"></i>--}}
                                                                            </button>
                                                                        </form>
{{--                                                                        <form method="post" class="ms2_form" role="form">--}}
{{--                                                                            <div class="input-group">--}}
{{--                                                                                <span class="input-group-btn">--}}
{{--                                                                                    <button type="button" class="btn-number btn-minus" data-type="minus" data-field="quantity-{{$product->id}}">-</button>--}}
{{--                                                                                </span>--}}
{{--                                                                                <input type="text" name="quantity" id="quantity-{{$product->id}}" class="form-control input-number" value="{{ $itemQuantity }}" data-min="1" data-max="99999999">--}}
{{--                                                                                <span class="input-group-btn">--}}
{{--                                                                                    <button type="button" class="btn-number btn-plus" data-type="plus" data-field="quantity-{{$product->id}}">+</button>--}}
{{--                                                                                </span>--}}
{{--                                                                            </div>--}}
{{--                                                                            <button class="btn btn-default" type="submit" name="ms2_action" value="cart/change"><i class="glyphicon glyphicon-refresh"></i></button>--}}
{{--                                                                        </form>--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                    <div class="cart-total-wrapper">
                        <div class="push30"></div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-push-6 text-right-sm black f18">
                                <div class="push5"></div>
                                <span>Итого: </span>
                                <span class="total_count">
                        <span class="ms2_total_count">{{$cost}}</span>
                        шт.                    </span>
                                на сумму
                                <span class="total_cost">
                        <span class="ms2_total_cost bold f22">{{ number_format($basketCost, 2, '.', '') }}</span>
                        руб.                    </span>
                                <div class="push20"></div>
                            </div>
                            <div class="col-sm-6 col-sm-pull-6">
                                <div class="push3"></div>
                                <form action="{{ route('basket.clear') }}" method="post" style="display: inline;">
                                    @csrf
                                    <button class="btn" type="submit" name="ms2_action" value="cart/clean" title="Очистить корзину">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                </form>
                                <a href="{{route('basket.oformlenie')}}" class="btn invert">Оформить заказ <i class="material-icons">arrow_forward</i></a>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Ваша корзина пуста</p>
                @endif
            </div>
        </div>
    </div>

    <div class="push150"></div>
    <div class="push150"></div>
    <div class="push20"></div>
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
@endsection
