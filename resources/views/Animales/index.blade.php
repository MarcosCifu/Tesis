@extends('template')
@section('content')
    @include('errors')
    <div class="animated flipInY">
        <div class="box">
            <div class="box-header">
                <h3>Listado de Animales</h3>
                <a href="{{route('admin.animales.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Animal</a>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="animales" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Numero de Guia</th>
                            <th>DIIO</th>
                            <th>Tipo</th>
                            <th>Galpón</th>
                            <th>Corral</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($animales as $animal)
                        <tr>
                            <td>{{$animal->numero_Guia}}</td>
                            <td><a href="{{ route('admin.animales.perfil', $animal->id) }}">{{$animal->DIIO}}</a></td>
                            <td>{{$animal->tipo}}</td>
                            <td>Galpón {{$animal->corral->galpon->numero}}</td>
                            <td>Corral {{$animal->corral->numero}}</td>
                            <td> @if($animal->estado == "vivo")
                                    <span class="label label-success">{{$animal->estado}}</span>
                                @else
                                    @if($animal->estado == "muerto")
                                        <span class="label label-danger">{{$animal->estado}}</span>
                                    @else
                                        <span class="label label-warning">{{$animal->estado}}</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.animales.edit', $animal->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                <a href="{{ route('admin.animales.destroy', $animal->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este animal?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
            $('#animales').DataTable({
                "info": false,
                "scrollX" : true,
                "lengthMenu": [[5,10, 20, -1], [5,10, 20, "Todos"]]
            });
        });
    </script>
@endsection