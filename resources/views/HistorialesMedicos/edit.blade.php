@extends('template')

@section('title','Ingresar Historial Medico')


@section('content')
    @include('errors')
    {{ Form::model($historial,['route' => ['admin.historiales.update', $historial->id], 'method' => 'PUT']) }}
    <div class="form-group">
        {!! Form::label('enfermedad' ,'Diagnostico') !!}
        {!! Form::text('enfermedad', null, ['class' => 'form-control', 'placeholder' => 'Enfermedad del Animal' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha' ,'Fecha de Diagnostico') !!}<br>
        {!! Form::date('fecha', $fecha) !!}
    </div>
    <div class="form-group">
        {!! Form::label('animales' ,'Animal') !!}
        {!! Form::select('id_animales', $animales, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}
@endsection