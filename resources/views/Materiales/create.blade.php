@extends('template')

@section('title','Ingresar Material')


@section('content')
    @include('errors')
    {{ Form::open(['route' => 'admin.materiales.store', 'method' => 'POST']) }}
    <div class="form-group">
        {!! Form::label('numero' ,'Número') !!}
        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Material' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombre' ,'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Material' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('umb','Uniddad de Medida Base') !!}
        {!! Form::select('umb',[ 'kg' => 'KG' , 'un' => 'UN', 'l' => 'L'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cantidad' ,'Cantidad Estimada') !!}
        {!! Form::text('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de Material' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('observacion' ,'Observación') !!}
        {!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => 'Observación del Material' ]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}
@endsection