@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="panel panel-default animated pulse slow go">
                    <div class="panel-heading">
                        <h1>Información del <b>Animal</b></h1>
                    </div>
                    <div class="panel-body">
                        <section>
                            {{ Form::model($animal ,['route' => ['admin.animales.update', $animal->id] , 'method' => 'PUT', 'files'=>true]) }}
                            <div class="form-group">
                                {!! Form::label('diio' ,'DIIO') !!}
                                {!! Form::text('DIIO', null, ['class' => 'form-control', 'placeholder' => 'DIIO del animal' , 'required','minlength="7"','maxlength="8"' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('type','Tipo') !!}
                                {!! Form::select('tipo',[ 'Vaca' => 'Vaca' , 'Novillo' => 'Novillo', 'Vaquilla' => 'Vaquilla' , 'Ternero' => 'Ternero', 'Ternera' => 'Ternera'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('corral','Corral') !!}
                                {!! Form::select('corral', $corrales, $animal->id_corral ,['class'=> 'form-control', 'placeholder' => 'Seleccione un corral' , 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('estado','Estado') !!}
                                {!! Form::select('estado',[ 'Vivo' => 'Vivo' , 'Muerto' => 'Muerto', 'Enfermo' => 'Enfermo' ], $animal->estado,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fecha_compra','Fecha de Ingreso') !!}<br>
                                {!! Form::date('fecha',$animal->created_at) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pesaje_inicial', 'Pesaje inicial') !!}
                                {!! Form::text('pesaje_inicial', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del animal en KG' , 'required' ]) !!}

                            </div>
                            <div class="form-group">
                                {!! Form::label('venta','Estado Venta') !!}
                                {!! Form::select('venta',[ 0 => 'No vendido' , 1 => 'Vendido'],null ,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen del Animal') !!}
                                {!! Form::file('path') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::hidden('user_id', Auth::user()->id , null , ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Guardar' ,['class' => 'btn btn-success']) !!}

                            </div>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection