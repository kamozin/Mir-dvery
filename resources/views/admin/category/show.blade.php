@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Факультеты</div>

                    <div class="panel-body">
                        <a href="/admin/category/store" class="btn btn-primary">Добавить категорию</a>
                    </div>
                    <div class="panel-body">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>№ п/п</th>
                                <th>Наименование категории</th>
                                <th>Категория родитель</th>
                                <th>Редактировать</th>
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

                                        @endif
                                    </td>
                                    <td><a href="/admin/category/edit/{{$c->id}}">Редактировать</a></td>
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

    <link href="/includes/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

@stop
@section('footer')
    <script src="/includes/js/datatables/jquery.dataTables.min.js"></script>
    <script>

        $('#datatable-responsive').DataTable({

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Russian.json"
            }
        });
    </script>
@stop