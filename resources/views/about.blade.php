@extends('layouts.welcome_all_app')

@section('content')
    <body id="page-top">

    <div class="push20"></div>




    <div class="middle">
        <div class="push70"></div>
        <div class="container">
            <div class="mini-container">

                <h1>О нас</h1>


                <img src="image/foto.jpg">
                <div class="push40"></div>



                <div class="content">
                    <h4>Оперативная доставка еды может потребоваться в следующих ситуациях</h4>
                    <ul class="list">
                        <li>когда совершенно нет времени готовить ужин или завтрак, интенсивная работа и обилие неотложных дел не позволяют проводить часы на кухне;</li>
                        <li>домашняя пища может надоесть, хочется попробовать новые, интересные блюда, готовить еду самостоятельно нет желания;</li>
                        <li>если в гости собирается прийти большая компания друзей или родственников, приготовить и накрыть полный стол затруднительно;</li>
                        <li>для людей, находящихся в командировке, заказ еды в компании "Сомокат" – отличный вариант хорошо поужинать или пообедать;</li>
                        <li>для офисных работников возможность заказать бургеры у нас – это способ вкусно пообедать с минимальными затратами времени.</li>
                    </ul>
                    <blockquote>Жители Ковылкино и гости республики Мордовия могут воспользоваться предложением компании "Сомокат", заказать готовую еду на дом, в офис, гостиницу. Для посиделок на природе или на даче отличный вариант - доставка еды. Все блюда готовятся профессиональными поварами, отличаются вкусовыми качествами, выполнены из экологически чистых продуктов.</blockquote>
                    <h4>Преимущества:</h4>
                    <ul class="list">
                        <li>профессиональные знания и опыт,</li>
                        <li>высокий уровень сервиса — мы всегда работаем для клиента,</li>
                        <li>динамичность и гибкость.</li>
                    </ul>
                </div>
                <div class="push30"></div>

            </div>

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
