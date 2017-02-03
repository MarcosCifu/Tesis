@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="panel panel-default animated pulse slow go">
                    <div class="panel-heading">
                        <h1>Información del <b>Diagnostico Médico</b></h1>
                    </div>
                    <div class="panel-body">
                        <section>
                            {{ Form::model($historial,['route' => ['admin.historiales.update', $historial->id], 'method' => 'PUT']) }}
                                <div class="form-group">
                                    {!! Form::label('animales' ,'Animal') !!}
                                    {!! Form::select('id_animales', $animales, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required','disabled' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('enfermedad' ,'Diagnostico') !!}
                                    {!! Form::text('enfermedad', null, ['class' => 'form-control', 'placeholder' => 'Enfermedad del Animal' , 'required' ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tratamiento' ,'Tratamiento') !!}
                                    {!! Form::text('tratamiento', null, ['class' => 'form-control', 'placeholder' => 'Tratamiento para la enfermedad del Animal']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('estado_tratamiento' ,'Estado del tratamiento') !!}
                                    {!! Form::select('estado_tratamiento',[ 'En tratamiento' => 'En tratamiento' , 'Tratamiento terminado' => 'Tratamiento terminado', 'Tratamiento no comenzado' => 'Tratamiento no comenzado'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('fecha' ,'Fecha de Diagnostico') !!}<br>
                                    {!! Form::date('fecha', $fecha) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Guardar' ,['class' => 'btn btn-primary']) !!}

                                </div>
                                {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection