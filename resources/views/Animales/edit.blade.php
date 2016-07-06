@extends('template')
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-lg-5">
            <div class="box box-primary">
                <div class="box-body">
                    {{ Form::model($animal,['route' => ['admin.animales.update', $animal->id] , 'method' => 'PUT']) }}
                    <div class="form-group">
                        {!! Form::label('diio' ,'DIIO') !!}
                        {!! Form::text('DIIO', null, ['class' => 'form-control', 'placeholder' => 'DIIO del animal' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tipo','Tipo') !!}
                        {!! Form::select('tipo',[ 'vaca' => 'Vaca' , 'novillo' => 'Novillo', 'vaquilla' => 'Vaquilla' , 'ternero' => 'Ternero', 'ternera' => 'Ternera'], $animal->tipo,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('corral','Corral') !!}
                        {!! Form::select('corral', $corrales ,$animal->corral->id,['class'=> 'form-control', 'placeholder' => 'Seleccione un corral' , 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('estado','Estado') !!}
                        {!! Form::select('estado',[ 'vivo' => 'Vivo' , 'muerto' => 'Muerto', 'enfermo' => 'Enfermo' ],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_compra','Fecha de Ingreso') !!}<br>
                        {!! Form::date('fecha', $animal->created_at) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('user_id', Auth::user()->id , null , ['class'=>'form-control']) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::submit('Actualizar' ,['class' => 'btn btn-primary']) !!}

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection