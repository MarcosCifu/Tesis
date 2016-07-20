@extends('template')
@section('content')
    @include('errors')
    <div class="animated pulse slow go">
            <div class="box">
                <div class="box-header">
                    <h3>Listado de <b>Materiales</b></h3>
                    <a href="{{route('admin.materiales.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Material</a>
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
                                <th>Acción</th>
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
                                    <td>
                                        <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                        <a href="{{ route('admin.materiales.destroy', $material->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este material?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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