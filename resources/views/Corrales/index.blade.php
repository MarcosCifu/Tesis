@extends('template')
@section('content')
    @include('errors')
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <h3>Listado de <b>Corrales</b></h3>
                <a href="{{route('admin.corrales.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Corral</a>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="corrales" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Cantidad Actual de Animales</th>
                            <th>Galpón</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($corrales as $corral)
                            <tr>
                                <td><a href="{{ route('admin.corrales.perfil', $corral->id) }}" class="btn btn-primary">Corral {{$corral->numero}}</a></td>
                                <td>{{$corral->cantidad}}</td>
                                <td>Galpón {{$corral->galpon->numero}}</td>
                                <td>
                                    <a href="{{ route('admin.corrales.edit', $corral->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.corrales.destroy', $corral->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este corral?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#corrales').DataTable({
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
                },
                "lengthMenu": [[10, 20, -1], [10, 20, "Todos"]]
            });
        });
    </script>
@endsection



