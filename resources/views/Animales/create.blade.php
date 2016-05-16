@extends('template')

@section('title','Ingresar Animal')


@section('content')
    @include('errors')
    {{ Form::open(['route' => 'admin.animales.store', 'method' => 'POST', 'files'=>true]) }}
    <div class="form-group">
        {!! Form::label('diio' ,'DIIO') !!}
        {!! Form::text('DIIO', null, ['class' => 'form-control', 'placeholder' => 'DIIO del animal' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('numero_Guia' ,'Numero de Guia') !!}
        {!! Form::text('numero_Guia', null, ['class' => 'form-control', 'placeholder' => 'Numero de Guia' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('tipo',[ 'vaca' => 'Vaca' , 'novillo' => 'Novillo', 'vaquilla' => 'Vaquilla' , 'ternero' => 'Ternero', 'ternera' => 'Ternera'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('id_corral','Corral') !!}
        {!! Form::select('id_corral', $corrales , null ,['class'=> 'form-control', 'placeholder' => 'Seleccione un corral' , 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('estado','Estado') !!}
        {!! Form::select('estado',[ 'vivo' => 'Vivo' , 'muerto' => 'Muerto', 'enfermo' => 'Enfermo' ],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_ingreso','Fecha de Ingreso') !!}<br>
        {!! Form::date('fecha_compra', $fecha) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image','Imagen del Animal') !!}
        {!! Form::file('path') !!}
    </div>
    <div class="form-group">
        {!! Form::hidden('user_id', Auth::user()->id , null , ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}
@endsection