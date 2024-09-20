@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Уведомление') }}</div>

                <div class="card-body">
                    <div class="">
                        {{ __('Вы успешно вошли.') }}
                    </div>


                        <a href="@if(auth()->user()->is_admin){{route('admin')}}@else {{url('/')}}@endif">
                            <button class="float-right btn btn-lg">Продолжить</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="push120"></div>
<div class="push120"></div>
<div class="push110"></div>
<div class="push110"></div>

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
