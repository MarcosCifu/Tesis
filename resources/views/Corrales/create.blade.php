@extends('template')
@section('title','Ingresar Corral')
@section('content')
    @include('errors')
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
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}

@endsection