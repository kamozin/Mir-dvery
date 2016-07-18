<!DOCTYPE html>
<html>
<head>
    <title>Мир дверей</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/includes/css/style.css">
    <link rel="stylesheet" type="text/css" href="/includes/css/bootsass.css">
    <link rel="stylesheet" type="text/css" href="/includes/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/includes/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/includes/slick/slick-theme.css"/>
    @yield('header')
</head>
<body>
<header>
    <div id="top_menu" class="fixedMenu">
        <!-- Верхнее меню -->
        <ul id="big_menu">
            <li>
                <a href="/" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Главная</a>
            </li>
            <li>
                <a href="/page/about" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>О компании</a>
            </li>
            <li>
                <a href="/catalog" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Каталог
                    продукции</a>
            </li>
            <li>
                <a href="/e-catalog/" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Электронный
                    каталог</a>
            </li>
            <li>
                <a href="/page/service/" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Сервис</a>
            </li>
            <li>
                <a href="/page/credit/" class="menu_center"><i class="fa fa-caret-right"
                                                               aria-hidden="true"></i>Кредит</a>
            </li>
            <li>
                <a href="/page/kontakty" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Контакты</a>
            </li>
        </ul>


        <div id="phone">
            <p style="margin-top: 0px;">Брянск, ул. Дуки, д. 65 (здание МПСУ)<br>Телефоны: (4832) 33-77-13, 30-60-34</p>
        </div>
        <div class="clear"></div>

        {{--Для телефонов--}}
        <nav id="drop_wrap">
            <div id="menu-icon" ><i class="fa fa-list" aria-hidden="true"></i>Меню</div>
            <ul id="little_menu" class="no_active">
                <li>
                    <a href="/" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Главная</a>

                </li>
                <li>
                    <a href="/page/about" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>О
                        компании1</a>
                </li>
                <li>
                    <a href="/catalog" class="menu_center"><i class="fa fa-caret-right"
                                                                        aria-hidden="true"></i>Каталог продукции</a>
                </li>
                <li>
                    <a href="/e-catalog/" class="menu_center"><i class="fa fa-caret-right" aria-hidden="true"></i>Электронный
                        каталог</a>
                </li>
                <li>
                    <a href="/page/service/" class="menu_center"><i class="fa fa-caret-right"
                                                               aria-hidden="true"></i>Сервис</a>
                </li>
                <li>
                    <a href="/credit/" class="menu_center"><i class="fa fa-caret-right"
                                                              aria-hidden="true"></i>Кредит</a>
                </li>
                <li>
                    <a href="/page/kontakty" class="menu_center"><i class="fa fa-caret-right"
                                                                        aria-hidden="true"></i>Контакты</a>
                </li>
            </ul>
        </nav>
        {{--Для телефонов--}}
    </div>
    <div class="slaider">
        <div class="fade">
            <div><img src="/gallery/slider_top/0.jpg"></div>
            <div><img src="/gallery/slider_top/1.jpg"></div>
            <div><img src="/gallery/slider_top/2.jpg"></div>
            <div><img src="/gallery/slider_top/3.jpg"></div>
            <div><img src="/gallery/slider_top/4.jpg"></div>
            <div><img src="/gallery/slider_top/5.jpg"></div>
            <div><img src="/gallery/slider_top/6.jpg"></div>
            <div><img src="/gallery/slider_top/7.jpg"></div>

        </div>
    </div>
    {{--<div id="logotype"><a href="/"><img src="/includes/image/logotype.png" alt="Мир Дверей" width="405" height="107" border="0" title="Мир Дверей"></a></div>--}}
</header>
<div class="container">
    @yield('content')
</div>
<footer>
    <div id="footer">
        <div id="footer-position">
            <div id="f-contacts">
                <span>+7 (4832) 33-77-13</span><br>
                <span>+7 (4832) 30-60-34</span>
            </div>
            <div id="site_info">
                © 2010-2016 Компания «Мир Дверей» - металлические и межкомнатные двери в Брянске<br>
                <a href="http://www.dynamicweb.su/">Веб студия Dynamicweb</a><br>
                <a href="/map/">Карта сайта</a>
            </div>
            <div id="counter">

            </div>
            <div class="clear"></div>
        </div>
    </div>

</footer>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!--<script src="js/jquery-2.1.1.min.js"></script>-->
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/includes/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.fade').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 1000,
            fade: false,
            cssEase: 'linear'
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.fade1').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 1000,
            fade: false,
            cssEase: 'linear'
        });
    });
</script>

    <script type="text/javascript">
            $("#menu-icon").click(function(){
                $("#little_menu").slideToggle();
                $("#little_menu").removeClass("no_active").toggleClass("active");


                        });
    </script>



@yield('footer')

</body>
</html>