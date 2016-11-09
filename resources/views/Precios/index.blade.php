@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Valor por Kilo</b></h3>
                </div>
                <div class="modal-body">
                    @include('Precios.create')
                </div>
            </div>
        </div>
    </div>
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#registrar">
                    <i class="fa fa-folder-open-o"></i> Registar nuevo Precio
                </button>
                <h3>Listado de <b>Precios por Kilo de Carne</b></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="precios" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($precios as $precio)
                        <tr>
                            <td>${{$precio->valor}} /Kg</td>
                            <td>{{$precio->fecha}}</td>

                            <td>
                                <a href="{{ route('admin.precios.edit', $precio->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                <a href="{{ route('admin.precios.destroy', $precio->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este material?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
