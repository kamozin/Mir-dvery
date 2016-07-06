@extends('app')


@section('header')

    <link rel="stylesheet" type="text/css" href="/includes/css/magnific-popup.css">
    @stop

@section('content')
    <div id="content">
        <h1>{{$page['name']}}</h1>
{!! $page['text'] !!}
    </div>

    @stop


@section('footer')
    <script type="text/javascript" src="/includes/js/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="/includes/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.zoom-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                    // titleSrc: function(item) {
                    // 	return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                    // }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function(element) {
                        return element.find('img');
                    }
                }

            });
        });
    </script>

    @stop