@extends('layouts.contact_app')

@section('content')

    <body id="page-top">

    <div class="push20"></div>
    <div class="push70"></div>



    <div id="mapexMap" ></div>

    <div class="contacts-section relative">
        <div class="push40"></div>
        <div class="push20 hidden-xs"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="inner box1">
                        <div class="title-h1">Обратная связь</div>
                        <div class="rf">
                            <form method="POST" action="{{ route('store_message') }}" class="ajax_form">
                                @csrf
                                <div class="row min">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Имя" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control required" required placeholder="Email *" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control required" placeholder="Ваше сообщение *" required></textarea>
                                </div>
                                <div class="push20"></div>
                                <div class="agreement form-group">
                                    <input type="checkbox" name="agreement" id="agreement2" class="required" required>
                                    <label for="agreement2">
                                        <i class="material-icons checked">check_box</i>
                                        <i class="material-icons no-checked">check_box_outline_blank</i>
                                        Согласен на обработку персональных данных *
                                    </label>
                                </div>

                                <p><span class="red">*</span> <span class="f12">- поля, обязательные для заполнения</span></p>
                                <div class="push30"></div>


                                <input name="contactsbtn" type="submit" class="btn block" value="Отправить">

                                <input type="hidden" name="af_action" value="68e1a948a180ec5adb7a8159a1076b8f" />
                            </form>
                        </div>
                    </div>
                    <div class="push30 hidden-lg hidden-md"></div>
                </div>
                <div class="col-md-5 col-lg-4 col-lg-offset-1">
                    <div class="inner box2">
                        <div class="title-h1">Контакты</div>

                        <div class="element">
                            <div class="title">
                                Адрес
                            </div>
                            <div class="text">
                                г. Ковылкино
                            </div>
                        </div>


                        <div class="element">
                            <div class="title">
                                Время работы
                            </div>
                            <div class="text">
                                c 11:00 - 22:00 Без выходных
                            </div>
                        </div>



                        <div class="element">
                            <div class="title">
                                Телефоны
                            </div>
                            <div class="text">
                                <div><a href="tel:+79010000010">+7 (904) 720-00-10</a></div>
                                <div><a href="tel:+79270000015">+7 (904) 720-00-10</a></div>
                            </div>
                        </div>



                        <div class="element">
                            <div class="title">
                                Email
                            </div>
                            <div class="text">
                                <a href="mailto:info@sitename.com">somokat@gmail.com</a>
                            </div>
                        </div>


                    </div>
                    <div class="push30 hidden-lg hidden-md"></div>
                </div>
            </div>
        </div>
        <div class="push70 hidden-xs hidden-sm"></div>
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
