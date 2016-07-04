
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lrrang="ru" lang="ru">
<head>
    <title>Магазин дверей</title>
    <meta name="description" content="Главная"></meta>
    <meta name="keywords" content="Главная"></meta>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"></meta>
    <meta name='yandex-verification' content='6c457d81ce33d862' />
    {{--<link rel="stylesheet" type="text/css" href="/includes/css/style1.css" />--}}
    {{--<link rel="stylesheet" type="text/css" href="/includes/css/style2.css" />--}}
    <link rel="stylesheet" type="text/css" href="/includes/css/style.css" />

    {{--<!-- jQuery -->--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/jquery/jquery.js"></script>--}}
    {{--<!-- validate -->--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/jquery/jquery.validate.js"></script>--}}
    {{--<!-- LightBox -->--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/jquery/lightbox/js/jquery.lightbox.js"></script>--}}
    {{--<link rel="stylesheet" type="text/css" href="/hostcmsfiles/jquery/lightbox/css/jquery.lightbox.css" media="screen" />--}}

    {{--<script type="text/javascript" src="/templates/template1/hostcms.js"></script>--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/ajax/JsHttpRequest.js"></script>--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/ajax/ajax.js"></script>--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/main.js"></script>--}}
    {{--<script type="text/javascript" src="/hostcmsfiles/menu.js"></script>--}}

    <!--  BBcode -->
    {{--<script type="text/javascript" src="/hostcmsfiles/jquery/bbedit/jquery.bbedit.js"></script>--}}

    {{--<script type="text/javascript">--}}
        {{--$(function() {--}}
            {{--$('#gallery a:has(img)').lightBox();--}}

            {{--$(window).scroll(function() {--}}
                {{--if ($(window).scrollTop() > 0) {--}}
                    {{--$('#top_menu').addClass('fixedMenu');--}}
                {{--} else {--}}
                    {{--$('#top_menu').removeClass('fixedMenu');--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

</head>

<body>
<div id="content-holder">
    <div id="header-all">
        <div id="header" style="background: url('../gallery/slider_top/2.jpg')">
            <div id="logotype"><a href="/"><img src="/includes/img/logotype.png" alt="Мир Дверей" width="405" height="107" border="0" title="Мир Дверей"></a></div>
            <div id="top_menu">
                <!-- Верхнее меню -->
                <ul>
                    <li>
                        <a href="/about" class="menu_center">О компании</a>
                    </li>
                    <li>
                        <a href="/catalog" class="menu_center">Каталог продукции</a>
                    </li>
                    <li>
                        <a href="/e-catalog" class="menu_center">Электронный каталог</a>
                    </li>
                    <li>
                        <a href="/service" class="menu_center">Сервис</a>
                    </li>
                    <li>
                        <a href="/credit" class="menu_center">Кредит</a>
                    </li>
                    <li>
                        <a href="/contacts" class="menu_center">Контакты</a>
                    </li>
                </ul>
                <div id="phone">
                    <p style="margin-top: 0px;">Брянск, ул. Дуки, д. 65 (здание МПСУ)<br />Телефоны: (4832) 33-77-13, 30-60-34</p>				</div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div id="content">
        <!-- Вызов шаблона для текущей страницы -->
        <!-- Центральный блок -->

     @yield('content')



    </div>
</div>

<div id="footer">
    <div id="footer-position">
        <div id="f-contacts">
            <span>+7 (4832) 33-77-13</span><br/>
            <span>+7 (4832) 30-60-34</span>
        </div>
        <div id="site_info">
            &copy; 2010-2016 Компания «Мир Дверей» - металлические и межкомнатные двери в Брянске<br />

            <a href="/map/">Карта сайта</a>
        </div>
        <div id="counter">

        </div>
        <div class="clear"></div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>


    i = 0;


    timerID = setTimeout(function tick () {
        if (i < 8) {

            i++;
            $("#header").css('background-image', 'url(../gallery/slider_top/' + i + '.jpg)');
            timerID = setTimeout(tick, 5000);
        }

        i=0;
    }, 5000);

//

</script>
</body>
</html>
