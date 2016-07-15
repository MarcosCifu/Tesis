@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary animated pulse slow go">
                    <div class="box-body">
                        <h3>Información del <b>Pesaje</b></h3>
                        <section>
                           {{ Form::open(['route' => 'admin.pesos.store', 'method' => 'POST']) }}
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('animales' ,'Animal') !!}
                                        {!! Form::select('id_animales', $animales, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
                                    </div>
                                </td>
                                <td>
                                   <div class="form-group">
                                       {!! Form::label('pesaje' ,'Pesaje') !!}
                                       {!! Form::text('pesaje', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del Animal' , 'required' ]) !!}
                                   </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('fecha' ,'Fecha del Pesaje') !!}<br>
                                        {!! Form::date('fecha', $fecha) !!}
                                    </div>
                                </td>
                                <td class="form-group">
                                    {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                                </td>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection