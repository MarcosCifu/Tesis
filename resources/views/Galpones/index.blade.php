@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Galpón</b></h3>
                </div>
                <div class="modal-body">
                    @include('Galpones.create')

                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Galpones</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    @if(Auth::user()->admin())
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                        Registar nuevo <b>Galpón</b>&nbsp; <i class="fa fa-building"></i>
                    </a>
                    @endif()
                </div><!-- /.box-header -->
                <div class="box-body ">
                    <table id="galpones" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Tamaño</th>
                                <th>Corrales</th>
                                <th>Cantidad de Animales</th>
                                @if(Auth::user()->admin())
                                <th>Acción</th>
                                @endif()
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galpones as $galpon)
                                <tr>
                                    <td><a href="{{ route('admin.galpones.perfil', $galpon->id) }}" class="badge">Galpón {{$galpon->numero}}</a></td>
                                    <td><b>{{$galpon->corrales()->sum('tamaño')}} m2</b></td>
                                    <td>
                                        @foreach($galpon->corrales as $corral)
                                            <a class="badge" href="{{route('admin.corrales.perfil',$corral->id)}}">Corral {{$corral->numero}} </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($galpon->corrales()->sum('cantidad_animales') == 0)
                                            <span class="label label-success">{{$galpon->corrales()->sum('cantidad_animales')}}</span>
                                        @else
                                            @if($galpon->corrales()->sum('cantidad_animales')/($galpon->corrales()->sum('tamaño')/3) < 0.7)
                                                <span class="label label-primary">{{$galpon->corrales()->sum('cantidad_animales')}}</span>
                                            @else
                                                @if($galpon->corrales()->sum('cantidad_animales')/($galpon->corrales()->sum('tamaño')/3) < 0.9)
                                                    <span class="label label-warning">{{$galpon->corrales()->sum('cantidad_animales')}}</span>
                                                @else
                                                    <span class="label label-danger">{{$galpon->corrales()->sum('cantidad_animales')}}</span>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    @if(Auth::user()->admin())
                                    <td>
                                        <a href="{{ route('admin.galpones.edit', $galpon->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                        <a href="{{ route('admin.galpones.destroy', $galpon->id) }}" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                    </td>
                                    @endif()
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#galpones').DataTable({
                "info": false,
                "scrollX" : true,
                "oSearch": { "bSmart": false, "bRegex": true },
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
        $('#registrargalpon').parsley();

    </script>
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
            // other options
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endsection