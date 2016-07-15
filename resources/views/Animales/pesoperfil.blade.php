@extends('template')
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-lg-5">
            <div class="box box-primary">
                <div class="box-header">
                    <h4>Ingresar Nuevo Pesaje</h4>
                </div>
                <div class="box-body">

                    {{ Form::open(['route' => 'admin.pesos.store', 'method' => 'POST']) }}
                        <div class="form-group">
                            {!! Form::label('animal' ,'DIIO Animal') !!}<br>
                            {!! Form::text('id_animales', $animal->DIIO, null, ['class' => 'form-control', 'required', 'disabled' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pesaje' ,'Pesaje') !!}
                            {!! Form::text('pesaje', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del Animal' , 'required' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha' ,'Fecha del Pesaje') !!}<br>
                            {!! Form::date('fecha', $fecha) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('id_animales', $animal->id , null , ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                        </div>
                    {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
@endsection