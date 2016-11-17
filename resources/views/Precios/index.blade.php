@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Valor por Kilo</b></h3>
                </div>
                <div class="modal-body">
                    @include('Precios.create')
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Precios por Kilo de Carne</b></h1>
        </div>
        <div class="panel-body">
            <div class="box box-primary">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            <i class="fa fa-folder-open-o"></i> Registar nuevo Precio
                        </a>
                    @endif()
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="precios" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Precio</th>
                            <th>Fecha</th>
                            @if(Auth::user()->admin())
                            <th>Acción</th>
                            @endif()
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($precios as $precio)
                            <tr>
                                <td>${{$precio->valor}} /Kg</td>
                                <td>{{$precio->fecha}}</td>
                                @if(Auth::user()->admin())
                                <td>
                                    <a href="{{ route('admin.precios.edit', $precio->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.precios.destroy', $precio->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este material?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>
                                @endif()
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#precios').DataTable({
                "info": false,
                "scrollX" : true,
                "language": {
                    "emptyTable": "No hay datos disponibles",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "lengthMenu": "Mostrar _MENU_ entradas"
                }
            });
        });
    </script>
@endsection
