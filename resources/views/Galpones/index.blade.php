@extends('template')
@section('content')
    @include('errors')
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <h3>Listado de <b>Galpones</b></h3>
                <a href="{{route('admin.galpones.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Galpon</a>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="galpones" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Cantidad actual de Corrales</th>
                            <th>Cantidad actual de Animales</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galpones as $galpon)
                            <tr>
                                <td><a href="{{ route('admin.galpones.perfil', $galpon->id) }}" class="btn btn-success">Galpón {{$galpon->numero}}</a></td>
                                <td>{{$galpon->corrales()->count()}}</td>
                                <td></td>
                                <td>
                                    <a href="{{ route('admin.galpones.corralcreate', $galpon->id) }}" class="btn btn-primary"><spam  class="fa fa-tags" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.galpones.edit', $galpon->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.galpones.destroy', $galpon->id) }}" class="btn btn-danger"><spam onclick = "return confirm('¿Seguro que deseas eliminar este gapón?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
            $('#galpones').DataTable({
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