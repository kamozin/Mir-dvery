@extends('main')

@section('content')
    <h1>{{$page['name']}}</h1>
{!! $page['text'] !!}

    @stop