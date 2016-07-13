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
                              action="/admin/products/update" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Наименование товара
                                    <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" name="name" value="{{ $product->name }}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Цена товара <span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="price" required="required" name="price" value="{{ $product->price }}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Ключевые слова
                                    <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="keywords" required="required" name="keywords" value="{{ $product->keywords }}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                    товара <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="description" required="required" name="description" value="{{ $product->description }}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Заголовок товара
                                    <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" required="required" name="title" value="{{ $product->title }}"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent_id">Категория <span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_category" class="form-control" id="parent_id">
                                        @foreach($category as $c)

                                            <option value="{{$c->id}}" @if($product->id_category==$c->id)selected @endif>{{$c->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Описание
                                    товара</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="message" class="form-control" name="text">{{$product->text}}</textarea>
                                </div>
                            </div>


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
                            <div class="col-md-12">

                                <h1>Справочники</h1>

                                <?php $i = 0; ?>
                                @foreach($dir as $d)

                                    <h2 style="color: darkred;">{{$d['directory']['name']}}</h2>

                                    @foreach($d['directory']['razdel'] as $razdel)
                                        <div class="col-md-12">
                                            <h2>{{$razdel['name']}}</h2>


                                            @foreach($razdel['harackteristick'] as $r)

                                                @if(empty($r))

                                                    <p>Нет свойств</p>
                                                @else
                                                    <div class="col-md-2">
                                                        <label for="id_{{$i}}" class="fest">
                                                            <input type="checkbox"  id="id_{{$i}}" name="directory[]" value="{{$r['harakt']['id']}}">
                                                            <img  width="50" height="50"   src="/gallery/directory/{{$r['harakt']['img']}}" alt="">
                                                            <p> {{$r['harakt']['name']}}</p>
                                                        </label>

                                                    </div>


                                                    <?php $i++; ?>
                                                @endif

                                            @endforeach
                                        </div>
                                    @endforeach

                                @endforeach



                            {{--</div>--}}
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/products" class="btn btn-primary">Отмена</a>
                                    <button type="submit" class="btn btn-success">Обновить
                                        товар
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

@stop