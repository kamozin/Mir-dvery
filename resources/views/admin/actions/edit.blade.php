@extends('layouts.app')

@section('header')


@stop

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Добавить новость</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (session()->has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>{{session()->get('error')}}</strong>
                            </div>

                        @endif

                        <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/admin/news/update" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $news->id }}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование новости <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" name="name" value="{{ $news->name }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Описание страницы<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="description" required="required" name="description" value="{{ $news->description }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Ключевые слова страницы<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="keywords" required="required" name="keywords" value="{{ $news->keywords }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Заголовок страницы<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" required="required" name="title" value="{{ $news->title }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Текст
                                    новости</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="message" class="form-control" name="text">{{ $news->text }}</textarea>
                                </div>
                            </div>


                            {{--<div class="form-group">--}}
                                {{--<label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Картинка  новости</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/news" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Обновить новость</button>
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
    <script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message');
    </script>
@stop