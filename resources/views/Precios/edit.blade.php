@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary animated pulse slow go">
                    <div class="box-body">
                        <h3>Información del <b>Valor por Kilo</b></h3>
                        <section>
                            {{ Form::model($precio, ['route' => ['admin.precios.update', $precio->id], 'method' => 'PUT']) }}
                            <div class="form-group">
                                {!! Form::label('valor' ,'Valor') !!}
                                {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Valor por Kilo' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fecha' ,'Fecha del Valor') !!}<br>
                                {!! Form::date('fecha', $fecha) !!}
                            </div>
                            <td class="form-group">
                                {!! Form::submit('Guardar' ,['class' => 'btn btn-primary']) !!}
                            </td>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection