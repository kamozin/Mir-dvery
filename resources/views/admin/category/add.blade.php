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
                            @if (session('error'))

                                {{dd(Session::get('error'))}}
                                <div class="alert alert-error alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{session('error')}}</strong>
                                </div>

                            @endif

                            @if (Session::has('message'))

                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{Session::get('message')}}</strong>
                                </div>

                            @endif
                            <form id="demo-form2" enctype="multipart/form-data"  method="POST" action="/admin/category/create" class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование категории <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" required="required" name="name" value="{{Input::old('name')}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent_id">Категория родитель <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="0">Родительская категория</option>
                                            @foreach($categories as $c)

                                                <option value="{{$c->id}}">{{$c->name}}</option>

                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Описание категории</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="message" class="form-control" name="text"></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Картинка  категории</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="tema" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/users" class="btn btn-primary">Отмена</a>
                                        <button type="submit" class="btn btn-success">Создать категорию</button>
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


    @stop