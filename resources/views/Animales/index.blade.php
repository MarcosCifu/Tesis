@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Animal</b></h3>
                </div>
                <div>
                    <div class="box-body">
                            {{ Form::open(['route' => 'admin.animales.store', 'method' => 'POST', 'files'=>true, 'data-parsley' =>'', 'id' => 'registraranimal']) }}
                            <div class="form-group">
                                {!! Form::label('diio' ,'DIIO') !!}
                                {!! Form::text('DIIO', null, ['class' => 'form-control', 'placeholder' => 'DIIO del animal' , 'required','minlength="7"','maxlength="8"' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('type','Tipo') !!}
                                {!! Form::select('tipo',[ 'Vaca' => 'Vaca' , 'Novillo' => 'Novillo', 'Vaquilla' => 'Vaquilla' , 'Ternero' => 'Ternero', 'Ternera' => 'Ternera'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('corral','Corral') !!}
                                {!! Form::select('corral', $corrales, null ,['class'=> 'form-control', 'placeholder' => 'Seleccione un corral' , 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('estado','Estado') !!}
                                {!! Form::select('estado',[ 'Vivo' => 'Vivo' , 'Muerto' => 'Muerto', 'Enfermo' => 'Enfermo' ], 'Vivo',['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fecha_compra','Fecha de Ingreso') !!}<br>
                                {!! Form::date('fecha',$fecha) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pesaje_inicial', 'Pesaje inicial') !!}
                                {!! Form::text('pesaje_inicial', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del animal en KG' , 'required' ]) !!}

                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen del Animal') !!}
                                {!! Form::file('path') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::hidden('user_id', Auth::user()->id , null , ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}

                            </div>
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Animales</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a type="button" class="btn btn-primary xs"  data-toggle="modal" data-target="#registrar">
                            Nuevo <b>Animal</b> &nbsp; <i class="fa fa-paw"></i>
                        </a>
                        <a href="{{route('admin.ventas')}}" type="button" class="btn btn-success xs">
                            Vender <b>Animal</b> &nbsp; <i class="fa fa-exchange"></i>
                        </a>
                    @endif()
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
                                    <th>Acción</th>
                                @endif()
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($animales as $animal)

                            <tr>
                                <td><a href="{{ route('admin.animales.perfil', $animal->id) }}"><span class="badge">{{$animal->DIIO}}</span></a></td>
                                <td>{{$animal->tipo}}</td>
                                <td><a href="{{ route('admin.galpones.perfil', $animal->corral->galpon->id) }}"><span class="badge">Galpón {{$animal->corral->galpon->numero}}</span></a></td>
                                <td><a href="{{ route('admin.corrales.perfil', $animal->corral->id) }}"><span class="badge">Corral {{$animal->corral->numero}}</span></a></td>
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
                                <td><b>{!! $animal->ultimopeso->pesaje or "0"!!} KG</b></td>
                                @if(Auth::user()->admin())
                                <td>
                                    <a href="{{ route('admin.animales.edit', $animal->id) }}" class="btn btn-warning" ><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                    <a href="{{ route('admin.animales.destroy', $animal->id) }}" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
            $('#animales').DataTable({
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
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
            // other options
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    <script>
        $('#registraranimal').parsley();

    </script>
@endsection
