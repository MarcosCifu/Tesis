@extends('template')
@section('content')
    @include('errors')
    <!-- Modal  Crear-->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Corral</b></h3>
                </div>
                <div>
                    <div class="box-body">
                        <section>
                            {{ Form::open(['route' => 'admin.corrales.store', 'method' => 'POST']) }}
                            <div class="form-group">
                                {!! Form::label('numero' ,'Número') !!}
                                {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Corral' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('id_galpon' ,'Galpón') !!}
                                {!! Form::select('id_galpon', $galpones, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tamaño' ,'Tamaño') !!}
                                {!! Form::text('tamaño', null, ['class' => 'form-control', 'placeholder' => 'Tamaño en m2' , 'required' ]) !!}
                            </div>
                            <div class="form-group" >
                                {!! Form::label('atributos' ,'Atributos') !!}
                                {!! Form::select('atributos[]', $atributos, null, ['class' => 'form-control select-atributo' ,'multiple', 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
                            </div>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  Crear-->
    <div class="modal fade" id="registraratributo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Corral</b></h3>
                </div>
                <div>
                    <div class="box-body">
                        <section>
                                {{ Form::open(['route' => 'admin.atributos.store', 'method' => 'POST']) }}
                                <div class="form-group">
                                    {!! Form::label('nombre' ,'Nombre del Atributo') !!}
                                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del atributo' , 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

                                </div>
                                {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Corrales</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registraratributo">
                            <i class="fa fa-folder-open-o"></i> Registar nuevo Atributo
                        </a>
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            <i class="fa fa-folder-open-o"></i> Registar nuevo Corral
                        </a>
                    @endif()
                </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="corrales" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Tamaño</th>
                            <th>Animales</th>
                            <th>Galpón</th>
                            <th>Alimento</th>
                            <th>Agua</th>
                            @if(Auth::user()->admin())
                            <th> Acción</th>
                            @endif()
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($corrales as $corral)
                            <tr>
                                <td><a href="{{ route('admin.corrales.perfil', $corral->id) }}" class="badge" >Corral {{$corral->numero}}</a></td>
                                <td>{{$corral->tamaño}} m2</td>
                                <td>
                                    @if($corral->cantidad_animales == 0)
                                        <span class="label label-success">{{$corral->cantidad_animales}}</span>
                                    @else
                                        @if($corral->cantidad_animales > round($corral->tamaño-20/($corral->cantidad_animales*3)+20))
                                            <span class="label label-danger">{{$corral->cantidad_animales}}</span>
                                        @else
                                            @if($corral->cantidad_animales < round(($corral->tamaño/($corral->cantidad_animales*3))))
                                                <span class="label label-primary">{{$corral->cantidad_animales}}</span>
                                            @else
                                                <span class="label label-warning">{{$corral->cantidad_animales}}</span>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>Galpón {{$corral->galpon->numero}}</td>
                                <td>{{$corral->cantidad_animales*8}} KG</td>
                                <td>{{$corral->cantidad_animales*40}} LT</td>
                                @if(Auth::user()->admin())
                                <td>
                                        <a href="{{ route('admin.corrales.edit', $corral->id) }}" ><button class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></button> </a>
                                        <a href="{{ route('admin.corrales.destroy', $corral->id) }}"><button class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este corral?')"><spam class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></button> </a>
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
            $('#corrales').DataTable({
                "info": false,
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
                "lengthMenu": [[10, 20, -1], [10, 20, "Todos"]],
                scrollX: true
            });
        });

    </script>
@endsection
@section('ajaxjs')
    <script>
        $('#registrar').on('shown.bs.modal', function () {
            $('.select-atributo').chosen({
                placeholder_text_multiple:'Seleccione atributos del corral'
            });
        });
    </script>
@endsection




