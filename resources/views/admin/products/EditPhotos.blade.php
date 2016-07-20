@extends('layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="/includes/css/nustyle.css">
@stop

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Добавить категорию</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (session()->has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>{{session()->get('error')}}</strong>
                            </div>

                        @endif

                        <form id="demo-form2" enctype="multipart/form-data" method="POST"
                              action="/admin/products/update/photos" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $id }}">




                            <div class="form-group">
                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Картинка 1</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Картинка 2</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="files">
                                </div>
                            </div>




                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/products" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Обновить
                                        фото
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>




@stop


@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.fest input').click(function () {
                $(this).parent().toggleClass('click');
            });
        });


    </script>
    <script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message');
    </script>
@stop