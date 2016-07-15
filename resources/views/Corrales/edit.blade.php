@extends('template')
@section('content')
    @include('errors')  <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary animated pulse slow go">
                    <div class="box-body">
                        <h3>Información del <b>Corral</b></h3>
                        <section>
                            {{ Form::model($corral, ['route' => ['admin.corrales.update', $corral->id], 'method' => 'PUT']) }}
                                <div class="form-group">
                                    {!! Form::label('numero' ,'Número') !!}
                                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Corral' , 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cantidad' ,'Cantidad Estimada') !!}
                                    {!! Form::text('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Estimada de Animales'  ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('id_galpon' ,'Galpón') !!}
                                    {!! Form::select('id_galpon', $galpones, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Actualizar' ,['class' => 'btn btn-primary']) !!}
                                </div>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection