@extends('template')
@section('content')
    @include('errors')
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Animales</b></h1>
        </div>
        <div class="panel-body">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="animal" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>DIIO</th>
                            <th>Tipo</th>
                            <th>Galpón</th>
                            <th>Corral</th>
                            <th>Estado</th>
                            <th>Fecha Ingreso</th>
                            <th>Ultimo Pesaje</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($animales as $animal)
                        @if($animal->pesaje_actual >= 600 AND $animal->venta == 0)
                        <tr>
                            <td><a href="{{ route('admin.animales.perfil', $animal->id) }}"><span class="badge">{{$animal->DIIO}}</span></a></td>
                            <td>{{$animal->tipo}}</td>
                            <td>Galpón {{$animal->corral->galpon->numero}}</td>
                            <td>Corral {{$animal->corral->numero}}</td>
                            <td>
                                @if($animal->estado == "Vivo")
                                    <span class="label label-success">{{$animal->estado}}</span>
                                @else
                                    @if($animal->estado == "Muerto")
                                        <span class="label label-danger">{{$animal->estado}}</span>
                                    @else
                                        <span class="label label-warning">{{$animal->estado}}</span>
                                    @endif
                                @endif
                            </td>
                            <td>{{$animal->created_at->format('m/Y')}}</td>
                            <td>{!! $animal->ultimopeso->pesaje or "0"!!} KG</td>
                            @if(Auth::user()->admin())
                                <td>
                                    <a href="{{route('admin.vender',$animal->id)}}" class="btn btn-success pull-right" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><b>Vender</b></a>
                                </td>
                                @endif()
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            @if($animales->whereIn('pesaje_actual', [600, 2000])->count() >= 2)
            <div>
                <a href="{{route('admin.vendertodos')}}" class="btn btn-success pull-right" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No">Vender <b>Todos</b></a>
            </div>
                @endif
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#animal').DataTable({
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
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
            // other options
        });
    </script>
@endsection