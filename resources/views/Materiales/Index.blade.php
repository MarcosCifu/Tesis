@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Material</b></h3>
                </div>
                <div class="modal-body">
                    @include('Materiales.create')
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Materiales</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            Registar nuevo <b>Material</b> &nbsp;<i class="fa fa-wrench"></i>
                        </a>
                    @endif()
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="materiales" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nombre</th>
                                <th>UMB</th>
                                <th>Cantidad</th>
                                <th>Observación</th>
                                @if(Auth::user()->admin())
                                <th>Acción</th>
                                @endif()
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($materiales as $material)
                                <tr>
                                    <td>{{$material->numero}}</td>
                                    <td>{{$material->nombre}}</td>
                                    <td>{{$material->umb}}</td>
                                    <td> @if($material->cantidad > 20)
                                            <span class="label label-success">{{$material->cantidad}}</span>
                                        @else
                                            @if($material->cantidad < 5)
                                                <span class="label label-danger">{{$material->cantidad}}</span>
                                            @else
                                                <span class="label label-warning">{{$material->cantidad}}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{$material->observacion}}</td>
                                    @if(Auth::user()->admin())
                                    <td>
                                        <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                        <a href="{{ route('admin.materiales.destroy', $material->id) }}" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam  class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                    </td>
                                    @endif()
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
        </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#materiales').DataTable({
                "info": false,
                "scrollX" : true,
                "oSearch": { "bSmart": false, "bRegex": true },
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
        $('#registrarmaterial').parsley();

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