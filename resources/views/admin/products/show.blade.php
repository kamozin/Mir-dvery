    @extends('layouts.app')


    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Характеристики</div>

                        <div class="panel-body">
                            <a href="/admin/products/store" class="btn btn-primary">Добавить товар</a>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
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
                                    <th>Наименование товара</th>
                                    <th>Цена</th>
                                    <th>Категория</th>
                                    <th>Редактировать товар</th>
                                    <th>Удалить товар</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>
                                            {{$p->name}}
                                        </td>
                                        <td>
                                            {{$p->price}}
                                        </td>
                                        <td>
                                            @foreach($category as $c)
                                                @if($p->id_category==$c->id)

                                                {{$c->name}}

                                                @endif

                                            @endforeach
                                        </td>

                                        <td><a href="/admin/products/edit/{{$p->id}}">Редактировать</a></td>
                                        <td><a href="/admin/products/destroy/{{$p->id}}">Удалить</a></td>

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