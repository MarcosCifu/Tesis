@extends('template')
@section('content')
    @include('errors')
    <div class="modal modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    <button type="button" class="btn btn-primary btn-lg animated pulse slow go" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-folder-open-o"></i> Registar nuevo Atributo
    </button>
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <h3>Listado de <b>Atributos</b></h3>
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


                                <a href="{{ route('admin.atributos.destroy', $atributo->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este atributo?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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