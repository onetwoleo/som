@extends('layouts.app')

@section('content')
    <div class="middle">
        <div class="header-wrapper-push"></div>
        <div class="container">
            <div class="mini-container">
                <h1>Категории</h1>
                <button class="btn btn-md" style="horiz-align: center" data-toggle="modal" data-target="#modal_add_type">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    Добавить
                </button>
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (count($types) > 0)

                                        <table class="table table-sm table-striped table-responsive-sm table-condensed">
                                            <tbody>
                                            <tr>
                                                <th valign="top">
                                                    Название
                                                </th>
                                                <th valign="top">

                                                </th>
                                                <th valign="top">

                                                </th>
                                            </tr>
                                            @foreach($types as $type)
                                                <tr class='table-data row'>
                                                    <td  valign="top" class="col-md-8 col-xs-6 col-sm-6">
                                                        {{ $type->name }}
                                                    </td>
                                                    <td valign="top" class="col-md-2 col-xs-3 col-sm-3">
                                                        <a data-toggle="modal" data-target="#modal_destroy_type" data-content="{{ json_encode($type,TRUE)}}" href="#">
                                                            <button class="btn btn-md btn-outline-danger float-right">
                                                                <i class="fa fa fa-trash-o fa-x fa-lg"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td valign="top" class="col-md-2 col-xs-3 col-sm-3">
                                                        <a data-toggle="modal" data-target="#modal_update_type" data-content="{{ json_encode($type,TRUE)}}" href="#">
                                                            <button class="btn btn-md btn-outline-success" >
                                                                <i class="fa fa fa-cog fa-x fa-lg"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="middle">
        <div class="push50"></div>
        <div class="container">
            <div class="mini-container">
                <h1>Продукты</h1>
                <button class="btn btn-md" style="horiz-align: center" data-toggle="modal" data-target="#modal_add_product">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    Добавить
                </button>
                <div class="content">
                    <div class="cart-body" id="msCart">
                        @if (count($products) > 0)
                            @foreach($products as $product)
                        <div class="element">
                                <a data-toggle="modal" data-target="#modal_destroy_product" data-content="{{ json_encode($product,TRUE)}}" href="#">
                                    <button class="element-delete" title="Удалить"><i class="material-icons">close</i></button>
                                </a>
                            <a data-toggle="modal" data-target="#modal_update_product" data-content="{{ json_encode($product,TRUE)}}" href="#">
                                <button class="element-update" title="Редактировать"><i class="material-icons">settings</i></button>
                            </a>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="subelement2 relative">
                                        <div class="element-img relative" style="background: url({{$product->photo}}) 50% 50% no-repeat; background-size: contain;">
                                            <a href="admin/products/{{$product->id}}" class="absolute"></a>
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
{{--                                            <div class="col-xs-6 text-right-xs text-left-sm">--}}
{{--                                                <div class="element-counter" style="height: 100px;">--}}
{{--                                                    <div class="table">--}}
{{--                                                        <div class="table-cell">--}}
{{--                                                            <div class="input-group">--}}
{{--                                                                <form method="post" class="ms2_form" role="form">--}}
{{--                                                                    <input type="hidden" name="key" value="ms424a9074c32a43694d38ea349a7184ea" />--}}
{{--                                                                    <div class="input-group">--}}
{{--                                                            <span class="input-group-btn">--}}
{{--                                                                <button type="button" class="btn-number btn-minus" data-type="minus" data-field="count-108-1">-</button>--}}
{{--                                                            </span>--}}
{{--                                                                        <input type="text" name="count" id="count-108-1" class="form-control input-number" value="1" data-min="1" data-max="99999999">--}}
{{--                                                                        <span class="input-group-btn">--}}
{{--                                                                <button type="button" class="btn-number btn-plus" data-type="plus" data-field="count-108-1">+</button>--}}
{{--                                                            </span>--}}
{{--                                                                    </div>--}}
{{--                                                                    <button class="btn btn-default" type="submit" name="ms2_action" value="cart/change"><i class="glyphicon glyphicon-refresh"></i></button>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="push30"></div>

            </div>
        </div>
    </div>
    <div class="push30"></div>
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
    @include('admin.modal_store')
    @include('admin.modal_store_type')
    @include('admin.modal_destroy_product')
    @include('admin.modal_destroy_type')
    @include('admin.modal_update_product')
    @include('admin.modal_update_type')


@endsection
