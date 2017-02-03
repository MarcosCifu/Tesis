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
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            Registar nuevo <b>Diagnóstico</b>&nbsp;<i class="fa fa-stethoscope"></i>
                        </a>
                    @endif() </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="historiales" class="table table-bordered table-hover no-padding">
                        <thead>
                            <tr>
                                <th>Animal</th>
                                <th>Estado</th>
                                <th>Diagnostico</th>
                                <th>Tratamiento</th>
                                <th>Estado Tratamiento</th>
                                <th>Fecha</th>

                                @if(Auth::user()->admin())
                                <th>Acción</th>
                                @endif()
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($historiales as $historial)
                            <tr>
                                <td><a href="{{ route('admin.animales.perfil', $historial->animal->id) }}"><span class="badge">{{$historial->animal->DIIO}}</span></a></td>
                                <td>
                                    @if($historial->animal->estado == "Vivo")
                                        <span class="label label-success">{{$historial->animal->estado}}</span>
                                    @else
                                        @if($historial->animal->estado == "Muerto")
                                            <span class="label label-danger">{{$historial->animal->estado}}</span>
                                        @else
                                            <span class="label label-warning">{{$historial->animal->estado}}</span>
                                        @endif
                                    @endif
                                </td>
                                <td>{{$historial->enfermedad}}</td>
                                <td>{{$historial->tratamiento or 'Sin Tratamiento'}}</td>
                                <td>
                                    @if($historial->estado_tratamiento == "Tratamiento terminado")
                                        <span class="label label-success">{{$historial->estado_tratamiento}}</span>
                                    @else
                                        @if($historial->estado_tratamiento == "Tratamiento no comenzado")
                                            <span class="label label-danger">{{$historial->estado_tratamiento}}</span>
                                        @else
                                            <span class="label label-warning">{{$historial->estado_tratamiento}}</span>
                                        @endif
                                    @endif
                                </td>
                                <td>{{$historial->created_at->format('Y-m-d')}}</td>

                                @if(Auth::user()->admin())
                                <td>
                                    <a href="{{ route('admin.historiales.edit', $historial->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.historiales.destroy', $historial->id) }}" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam  class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>
                                @endif()
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#historiales').DataTable({
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
    <script>
        $('#registrarhistorial').parsley();

    </script>
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
            // other options
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endsection
