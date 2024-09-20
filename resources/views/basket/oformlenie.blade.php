@extends('layouts.app')

@section('content')
    <div class="middle">
        <div class="push50"></div>
        <div class="container">
            <div class="mini-container">

                <h1>Оформление заказа</h1>
                @if (count($products))
                    @php
                        $basketCost = 0;
                    @endphp
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
                        @endforeach
{{--                        @php--}}
{{--                            if ($basketCost<500){--}}
{{--                                $basketCost=$basketCost+100;--}}
{{--                            }--}}
{{--                        @endphp--}}
                    @endif
                @endif



                <div class="content">
                    <div class="order-wrapper" style="padding: 20px;">
                        <form class="form-horizontal ms2_form" id="msOrder" method="POST" action="{{ route('basket.oformlenie_store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-5">
                                    <h5 class="black"><i class="material-icons">person</i> Заполните следующую информацию:</h5>
                                    <div class="push20"></div>
                                    <div class="form-group input-parent">
                                        <input type="text" id="name" placeholder="Имя"
                                               name="name" value="" required
                                               class="form-control">
                                    </div>
                                    <div class="form-group input-parent">
                                        <input type="text" id="phone" placeholder="Телефон"
                                               name="phone" value="" required
                                               class="form-control">
                                    </div>
                                    <div class="form-group input-parent">
                                        <input type="text" id="address" placeholder="Адрес"
                                               name="address" value="" required
                                               class="form-control">
                                    </div>
{{--                                    <div class="form-group input-parent">--}}
{{--                                        <input type="text" id="building" placeholder="Дом"--}}
{{--                                               name="building" value=""--}}
{{--                                               class="form-control">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group input-parent">--}}
{{--                                        <input type="text" id="room" placeholder="Квартира"--}}
{{--                                               name="room" value=""--}}
{{--                                               class="form-control">--}}
{{--                                    </div>--}}

                                    <textarea id="comment" placeholder="Комментарий" name="comment" class="form-control"></textarea>


                                    <div class="push30"></div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-lg-offset-1">
                                    <div id="deliveries">
                                        <h5 class="black"><i class="material-icons">local_shipping</i> Выберите вариант доставки:</h5>
                                        <div class="push20"></div>
                                        <div class="form-group">
                                            <div class="customradio">
                                                <input type="radio" name="delivery" value="Самовывоз" id="delivery_1"
                                                       data-payments="[1,3]"
                                                       checked>
                                                <label class="delivery input-parent" for="delivery_1">Самовывоз</label>

                                                <p class="small">
                                                    г. Ковылкино                                    </p>
                                            </div>
                                            <div class="customradio">
                                                <input type="radio" name="delivery" value="Доставка курьером" id="delivery_2"
                                                       data-payments="[1,3]"
                                                >
                                                <label class="delivery input-parent" for="delivery_2">Доставка курьером</label>

                                                <p class="small">
                                                    Минимальный заказ для бесплатной доставки 500 руб. Если заказ на сумму менее 500 руб, стоимость доставки составляет 100 руб.                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="push30"></div>
                                    <h5><i class="material-icons">payment</i> Оплата:</h5>
                                    <div class="push20"></div>
                                    <div class="form-group">
                                        <div class="customradio">
                                            <input type="radio" name="payment" value="Оплата наличными" id="payment_1" checked>
                                            <label class="payment input-parent" for="payment_1">Оплата наличными</label>


                                        </div>
                                        <div class="customradio">
                                            <input type="radio" name="payment" value="Банковской картой" id="payment_3" >
                                            <label class="payment input-parent" for="payment_3">Банковской картой</label>

                                            <p class="small">
                                                Оплата картами Visa, MasterCard, Maestro, МИР (эквайринг на шаблоне не подключен)                                </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="push30"></div>


                            <div class="row min">
                                <div class="col-sm-6 col-sm-push-6  text-right-sm black f18">
                                    <span>Итого:</span> <span id="basketCost" class="bold f22">{{ number_format($basketCost, 2, '.', '') }}</span> руб.                <div class="push20"></div>
                                </div>
                                <div class="col-sm-6 col-sm-pull-6">
                                    <div class="push3"></div>
{{--                                    <form action="{{ route('basket.clear') }}" method="post" style="display: inline;">--}}
{{--                                        @csrf--}}
                                        <a href="{{url('/basket/index')}}" class="a-my">
                                            <button type="button" class="btn my-my-btn" name="ms2_action" title="Назад">
                                                <i class="material-icons">arrow_back</i> Назад
                                            </button>
                                        </a>
{{--                                    </form>--}}
                                    <button type="submit" name="ms2_action" value="order/submit" class="btn ms2_link invert">
                                        Сделать заказ! <i class="material-icons">send</i>
                                    </button>


{{--                                    <a href="korzina" class="tpl-btn"><i class="material-icons">arrow_back</i> Назад</a>--}}
{{--                                    <button type="submit" name="ms2_action" value="order/submit" class="btn ms2_link invert">--}}
{{--                                        Сделать заказ! <i class="material-icons">send</i>--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
