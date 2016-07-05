@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Акции</div>

                    <div class="panel-body">
                        <a href="/admin/actions/store" class="btn btn-primary">Добавить акцию</a>
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
                                <th>Наименование акции</th>
                                <th>Описание акии</th>
                                <th>Ключевые слова акции</th>
                                <th>Заголовок акции</th>
                                <th>Редактировать акцию</th>
                                <th>Обновить фото акции</th>
                                <th>Удалить акцию</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($actions as $a)
                                <tr>
                                    <td>{{$a->id}}</td>
                                    <td>
                                        {{$a->name}}
                                    </td>
                                    <td>{{$a->description}}</td>
                                    <td>{{$a->keywords}}</td>
                                    <td>{{$a->title}}</td>
                                    <td><a href="/admin/actions/edit/{{$a->id}}">Редактировать</a></td>
                                    <td><a href="/admin/actions/photo/{{$a->id}}">Обновить фото акции</a></td>
                                    <td><a href="/admin/actions/destroy/{{$a->id}}">Удалить</a></td>

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