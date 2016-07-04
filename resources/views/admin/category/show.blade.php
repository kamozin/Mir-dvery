@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Категории</div>

                    <div class="panel-body">
                        <a href="/admin/category/store" class="btn btn-primary">Добавить категорию</a>
                    </div>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>{{session()->get('success')}}</strong>
                    </div>
                    @endif
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>№ п/п</th>
                                <th>Наименование категории</th>
                                <th>Категория родитель</th>
                                <th>Редактировать</th>
                                <th>Обновить фото категории</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>
                                        {{$c->name}}
                                    </td>
                                    <td>
                                        @if($c->parent_id==0)
                                            Категория родитель
                                        @else
                                            @foreach($category as $cat)

                                                @if($c->parent_id==$cat->id)
                                                    {{$cat->name}}

                                                @endif
                                            @endforeach

                                        @endif
                                    </td>
                                    <td><a href="/admin/category/edit/{{$c->id}}">Редактировать</a></td>
                                    <td><a href="/admin/category/photo/{{$c->id}}">Обновить фото</a></td>
                                    <td><a href="/admin/category/destroy/{{$c->id}}">Удалить</a></td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('header')

    <link href="/includes/admin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@stop
@section('footer')
    <script src="/includes/admin/js/datatables/jquery.dataTables.min.js"></script>
    <script>

        $('#datatable-responsive').DataTable({

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Russian.json"
            }
        });
    </script>
@stop