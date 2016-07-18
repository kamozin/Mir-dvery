@extends('app')


@section('content')
    <h2>Каталог продукции</h2>



    <div class="catalog">

        @foreach($category as $c)
        <div class="produkt_catalog">
            <a href="/catalog/{{$c->url}}"> <img src="/gallery/category/{{$c->img}}">
                <p>{{$c->name}}</p></a>
        </div>
            @endforeach
    </div>



    @stop


