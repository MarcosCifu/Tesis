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
                <table id="animales" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>DIIO</th>
                        <th>Tipo</th>
                        <th>Galpón</th>
                        <th>Corral</th>
                        <th>Estado</th>
                        <th>Fecha Ingreso</th>
                        <th>Ultimo Pesaje</th>
                        @if(Auth::user()->admin())
                            <th><input type="checkbox" id="checkAll"/></th>
                        @endif()
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($animales as $animal)
                        @if($animal->pesaje_actual > 600)
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
                            <td>{!! $animal->ultimopeso->pesaje or "0"!!}</td>
                            @if(Auth::user()->admin())
                                <td>
                                    <input class="checkbox" type="checkbox" name="check[]">
                                </td>
                            @endif()
                        </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    @endsection