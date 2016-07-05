@extends('layouts.app')

@section('header')


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
                        @if (Session::has('error'))

                            <div class="alert alert-error alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('error')}}</strong>
                            </div>

                        @endif

                        @if (Session::has('message'))

                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <strong>{{Session::get('message')}}</strong>
                            </div>

                        @endif
                        <form id="demo-form2" enctype="multipart/form-data" method="POST" action="/admin/page/update"
                              class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $page->id }}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование
                                    страницы <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" name="name" value="{{$page->name}}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="description">Description<span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="description" required="required" name="description"
                                           value="{{$page->description}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Keywords<span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="keywords" required="required" name="keywords"
                                           value="{{$page->keywords}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title<span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" required="required" name="title"
                                           value="{{$page->title}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Текст
                                    страницы</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="message" class="form-control" name="text">{{$page->text}}</textarea>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/page" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Обновить Страницу</button>
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