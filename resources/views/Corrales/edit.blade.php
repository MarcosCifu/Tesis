@extends('template')
@section('content')
    @include('errors')
    <div id="form">
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
                                    {!! Form::label('id_galpon' ,'Galpón') !!}
                                    {!! Form::select('id_galpon', $galpones, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('atributos' ,'Atributos') !!}
                                    {!! Form::select('atributos[]', $atributos, $losatributos, ['class' => 'form-control select-atributo' ,'multiple', 'required' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cantidad_alimento' ,'Cantidad de alimento') !!}
                                    {!! Form::text('cantidad_alimento', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de alimento Mensual' , 'required' ]) !!}
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
@section('ajaxjs')
    <script>
        $(".select-atributo").chosen({
            placeholder_text_multiple:'Seleccione atributos del corral'
        });
    </script>
@endsection