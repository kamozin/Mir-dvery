@extends('app')



@section('content')

        <!-- Левый бар -->
<div class="left_bar">
    <h3> Каталог</h3>
    <ul class="topnav">
        <!-- <li><a href="index.html" target="_blank">Главная</a></li> -->
        <li><a href="#">Двери</a>
            <ul>
                <li><a href="#">Двери 1</a></li>
                <li><a href="#">Двери 2</a></li>
                <li><a href="#">Двери 3</a></li>
                <li><a href="#">Двери 4</a>
                    <ul>
                        <li><a href="#">Двери 41</a></li>
                        <li><a href="#">Двери 42</a></li>
                        <li><a href="#">Двери 43</a></li>
                    </ul>
                </li>
                <li><a href="#">Вкладки</a></li>
            </ul>
        </li>
        <li><a href="#">Окна</a>
            <ul>
                <li><a href="#">Окна 1</a></li>
                <li><a href="#">Окна 2</a></li>
                <li><a href="#">Окна 3</a></li>
                <li><a href="#">Окна 4</a>
                    <ul>
                        <li><a href="#">Окна 41</a></li>
                        <li><a href="#">Окна 42</a></li>
                        <li><a href="#">Окна 43</a></li>
                    </ul>
                </li>
                <li><a href="#">Вкладки</a></li>
            </ul>
        </li>
        <li><a href="#">Замки</a>
            <ul>
                <li><a href="#">Замки 1</a></li>
                <li><a href="#">Замки 2</a>
                    <ul>
                        <li><a href="#">Замки 431</a></li>
                        <li><a href="#">Замки 432</a></li>
                        <li><a href="#">Замки 433</a></li>
                    </ul>
                </li>
                <li><a href="#">Замки 3</a></li>
                <li><a href="#">Замки 4</a>
                    <ul>
                        <li><a href="#">Замки 431</a></li>
                        <li><a href="#">Замки 432</a></li>
                        <li><a href="#">Замки 433</a></li>
                    </ul>
                </li>
                <li><a href="#">Замки +100500</a></li>
            </ul>
        </li>
    </ul>
</div>



<!-- Название продукта и картинка -->
<div class="cart_prodykt">
    <h2>{{$product['name']}}</h2>
    <div class="zoom-gallery1">

        <div><a href="/gallery/products/{{$product['img_one']}}" style="width:100%;">
                <h3 id="prod">Внутреняя</h3>
                <h3 id="prod">Внешняя</h3>
                <img src="/gallery/products/{{$product['img_one']}}" width="400" height="400" id="zoom_prodykt1">
            </a>
        </div>
        <div>
            <a href="/gallery/products/{{$product['img_too']}}" style="width:100%;">
                <img src="/gallery/products/{{$product['img_too']}}" width="400" height="400" id="zoom_prodykt1">
            </a>
        </div>
    </div>
</div>

<!-- Цена и описание продукта -->

<div class="prodykt_option">
    <p>
        <b> Цена: {{$product['price']}} рублей</b>
    </p>
    <p>
        {!! $product['text'] !!}
    </p>
</div>


<div class="slaid_page">

    @foreach($spravochnick as $s)
    <h2> {{$s['directory']['name']}}</h2>
    @foreach($s['directory']['razdel'] as $r)
    <h3> {{$r['name']}}</h3>
    <div class="zoom-gallery" id="standart">
        <div class="slaider" id="slaider_ak">
            <div class="fade_dop">
                @foreach($r['harackteristick'] as $h)
                <div >
                    <a href="/gallery/directory/{{$h['harakt']['img']}}" style="width:100%;">
                        <img src="/gallery/directory/{{$h['harakt']['img']}}" width="200" height="300" id="zoom_prodykt"> </a>

                </div>
                @endforeach

            </div>
        </div>
    </div>
        @endforeach

    @endforeach

</div>






@stop