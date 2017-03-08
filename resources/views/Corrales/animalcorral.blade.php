@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="panel panel-default animated pulse slow go">
                    <div class="panel-heading">
                        <h1>Información del <b>Animal</b> para el <b>Corral</b> {{$corral->numero}}</h1>
                    </div>
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
                            {!! Form::hidden('corral', $corral->id ,['corral'=>'id','class'=> 'form-control', 'placeholder' => 'Seleccione un corral' , 'required']) !!}
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
@endsection
