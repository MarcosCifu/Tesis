@extends('template')

@section('title','Editar Corral '. $corral->numero)


@section('content')
    @include('errors')
    {{ Form::model($corral, ['route' => ['admin.corrales.update', $corral->id], 'method' => 'PUT']) }}
    <div class="form-group">
        {!! Form::label('numero' ,'Número') !!}
        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Corral' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cantidad' ,'Cantidad Estimada') !!}
        {!! Form::text('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Estimada de Animales' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('id_galpon' ,'Galpón') !!}
        {!! Form::select('id_galpon', $galpones, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}
@endsection