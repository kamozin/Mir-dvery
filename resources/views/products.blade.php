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
                        <li><a href="#">Двери 44</a></li>
                        <li><a href="#">Двери 44</a></li>
                        <li><a href="#">Двери 44</a>
                            <ul>
                                <li><a href="#">Двери 55</a></li>
                                <li><a href="#">Двери 55</a></li>
                                <li><a href="#">Двери 55</a>
                                    <ul>
                                        <li><a href="#">Двери 66</a></li>
                                        <li><a href="#">Двери 66</a></li>
                                        <li><a href="#">Двери 66</a>
                                            <ul>
                                                <li><a href="#">Двери 77</a></li>
                                                <li><a href="#">Двери 77</a></li>
                                                <li><a href="#">Двери 77</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
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
                <li class="active"><a href="#">Замки 1</a></li>
                <li><a href="#">Замки 2</a>
                    <ul>
                        <li><a href="#">Замки 431</a></li>
                        <li><a href="#">Замки 432</a></li>
                        <li><a href="#">Замки 433</a></li>
                    </ul>
                </li>
                <li><a href="#">Замки 3</a></li>
                <li><a href="#">Замки 4</a> </li>
                <li><a href="#">Замки +100500</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="catalog_prodykt">
    <div class="catalog">
        <h2>Элит</h2>
        @if(count($products)>0)
        @foreach($products as $p)
        <div id="catalog_catalog">
            <a href="/products/{{$p->url}}"> <img src="/gallery/products/{{$p->img_one}}">
                <p> {{$p->name}}</p></a>
        </div>

        @endforeach
        @else
        <h2>Нет товаров в данной категории</h2>

        @endif
    </div>

</div>



@stop


@section('footer')

    <script type="text/javascript" src="/includes/js/scriptbreaker-multiple-accordion-1.js"></script>

    <script language="javascript">
        $(document).ready(function() {
            $(".topnav").accordion({
                accordion:true,
                speed: 500,
                closedSign: '&#x25BA',
                openedSign: '▼'
            });
        });
    </script>


@stop