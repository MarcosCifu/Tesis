@extends('template')
@section('content')
    @include('errors')
    <div class="modal modal-primary fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Datos del <b>Atributo</b></h4>
                </div>
                <div class="modal-body">
                    @include('Atributos.create')
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Atributos</b></h1>
        </div>
        <div class="panel-body">
            <div class="box-header">
                @if(Auth::user()->admin())
                    <a type="button" class="btn btn-primary xs" data-toggle="modal" data-target="#myModal">
                        Nuevo <b>Atributo</b> &nbsp;<i class="fa fa-folder-open-o"></i>
                    </a>
                @endif()
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="materiales" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($atributos as $atributo)
                        <tr>
                            <td>{{$atributo->nombre}}</td>
                            <td>
                                <a href="{{ route('admin.atributos.edit', $atributo->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                <a href="{{ route('admin.atributos.destroy', $atributo->id) }}" class="btn btn-danger " class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam  class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
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
@endsection
@section('ajaxjs')
    <script>
        $('#registraratributo').parsley();

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