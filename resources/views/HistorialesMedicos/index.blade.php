@extends('template')
@section('content')
    @include('errors')
    <div class="animated flipInY">
        <div class="box">
            <div class="box-header">
                <h3>Listado de Historiales Medicos</h3>
                <a href="{{route('admin.historiales.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Diagnostico</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="historiales" class="table table-bordered table-hover no-padding">
                    <thead>
                        <tr>
                            <th>Animal</th>
                            <th>Diagnostico</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($historiales as $historial)
                    <tr>
                        <td>{{$historial->animal->DIIO}}</td>
                        <td>{{$historial->enfermedad}}</td>
                        <td>{{$historial->created_at->diffForHumans()}}</td>
                        <td> @if($historial->animal->estado == "vivo")
                                <span class="label label-success">{{$historial->animal->estado}}</span>
                            @else
                                @if($historial->animal->estado == "muerto")
                                    <span class="label label-danger">{{$historial->animal->estado}}</span>
                                @else
                                    <span class="label label-warning">{{$historial->animal->estado}}</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.historiales.edit', $historial->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                            <a href="{{ route('admin.historiales.destroy', $historial->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este diagnostico?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                        </td>

                    </tr>
                @endforeach
                    </tbody>
            </table>
                    {!! $historiales->render() !!}
            </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#historiales').DataTable({
                "info": false,
                "scrollX" : true
            });
        });
    </script>
@endsection
