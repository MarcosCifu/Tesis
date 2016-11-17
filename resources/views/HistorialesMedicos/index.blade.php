@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Diagnóstico</b></h3>
                </div>
                <div class="modal-body">
                    @include('HistorialesMedicos.create')
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Diagnósticos Medicos</b></h1>
        </div>
        <div class="panel-body">
            <div class="box box-primary">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            <i class="fa fa-folder-open-o"></i> Registar nuevo Diagnóstico
                        </a>
                    @endif() </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="historiales" class="table table-bordered table-hover no-padding">
                        <thead>
                            <tr>
                                <th>Animal</th>
                                <th>Diagnostico</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                @if(Auth::user()->admin())
                                <th>Acción</th>
                                @endif()
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($historiales as $historial)
                            <tr>
                                <td><a href="{{ route('admin.animales.perfil', $historial->animal->id) }}">{{$historial->animal->DIIO}}</a></td>
                                <td>{{$historial->enfermedad}}</td>
                                <td>{{$historial->created_at->diffForHumans()}}</td>
                                <td>    @if($historial->animal->estado == "vivo")
                                        <span class="label label-success">{{$historial->animal->estado}}</span>
                                    @else
                                        @if($historial->animal->estado == "muerto")
                                            <span class="label label-danger">{{$historial->animal->estado}}</span>
                                        @else
                                            <span class="label label-warning">{{$historial->animal->estado}}</span>
                                        @endif
                                    @endif
                                </td>
                                @if(Auth::user()->admin())
                                <td>
                                    <a href="{{ route('admin.historiales.edit', $historial->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.historiales.destroy', $historial->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este diagnostico?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
            $('#historiales').DataTable({
                "info": false,
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
