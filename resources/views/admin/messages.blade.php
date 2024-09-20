@extends('layouts.app')

@section('content')
    <div class="middle">
        <div class="container">
            <div class="mini-container">
                <h1>Сообщения пользователей</h1>
                @if (count($messages) > 0)
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                        <table class="table table-sm table-striped table-responsive-sm table-condensed">
                                            <tbody>
                                            <tr>
                                                <th valign="top">
                                                    Имя пользователя
                                                </th>
                                                <th valign="top">
                                                    Email
                                                </th>
                                                <th valign="top">
                                                    Сообщение
                                                </th>
                                                <th valign="top">

                                                </th>
                                            </tr>
                                            @foreach($messages as $message)
                                                <tr class='table-data '>
                                                    <td  valign="top" class="">
                                                        {{ $message->name }}
                                                    </td>
                                                    <td  valign="top" class="">
                                                        {{ $message->email }}
                                                    </td>
                                                    <td  valign="top" class="">
                                                        {{ $message->message }}
                                                    </td>
                                                    <td valign="top" class="">
                                                        <a data-toggle="modal" data-target="#modal_destroy_message" data-content="{{ json_encode($message,TRUE)}}" href="#">
                                                            <button class="btn btn-md btn-outline-danger float-right">
                                                                <i class="fa fa fa-trash-o fa-x fa-lg"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
    <div class="push120"></div>
    <div class="push120"></div>
    <div class="push110"></div>
    <div class="push120"></div>
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
    @include('admin.modal_destroy_message')
@endsection
