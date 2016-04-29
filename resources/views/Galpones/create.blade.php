@extends('template')

@section('title','Ingresar Galpón')


@section('content')
    @include('errors')
    {{ Form::open(['route' => 'admin.galpones.store', 'method' => 'POST']) }}
        <div class="form-group">
            {!! Form::label('numero' ,'Número') !!}
            {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Galpón' , 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cantidad' ,'Cantidad Estimada') !!}
            {!! Form::text('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Estimada de Animales' , 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

        </div>
    {{ Form::close() }}
@endsection