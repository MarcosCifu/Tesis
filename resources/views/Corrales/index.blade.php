@extends('template')
@section('content')
    @include('errors')
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <h3>Listado de Corrales</h3>
                <a href="{{route('admin.corrales.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Corral</a>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="corrales" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Cantidad Estimada</th>
                            <th>Galpón</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($corrales as $corral)
                            <tr>
                                <td>{{$corral->numero}}</td>
                                <td>{{$corral->cantidad}}</td>
                                <td>{{$corral->galpon->numero}}</td>
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
                "lengthMenu": [[5,10, 20, -1], [5,10, 20, "Todos"]]
            });
        });
    </script>
@endsection



