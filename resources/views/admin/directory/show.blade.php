@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Справочники</div>

                    <div class="panel-body">
                        <a href="/admin/directory/store" class="btn btn-primary">Добавить справочник/раздел</a>
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
                                <th>Наименование справочнка или раздела</th>
                                <th>Справочник</th>
                                <th>Характеристики</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($directory as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>
                                        {{$d->name}}
                                    </td>
                                    <td>
                                        @if($d->parent_id==0)
                                        Справочник
                                            @else
                                            @foreach($directory as $dir)

                                                @if($dir->id==$d->parent_id)

                                                    {{$dir->name}}

                                                    @endif
                                                @endforeach

                                        @endif
                                    </td>
                                    <td>
                                        @if($d->parent_id==0)
                                            Характеристики доступны только в разделе справочника
                                            @else
                                        <a href="/admin/directory/characteristics/{{$d->id}}">Характеристики</a>
                                            @endif
                                    </td>
                                    <td><a href="/admin/directory/edit/{{$d->id}}">Редактировать</a></td>
                                    <td><a href="/admin/directory/destroy/{{$d->id}}">Удалить</a></td>

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