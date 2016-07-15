@extends('template')
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-lg-5">
            <div class="box box-primary animated pulse slow go">
                <div class="box-header">
                    <h4>Ingresar Nuevo Diagnostico</h4>
                </div>
                <div class="box-body">
                    <tr>
                        {{ Form::model($animal,['route' => ['admin.animales.update', $animal->id], 'method' => 'PUT']) }}
                        <td>
                            <div class="form-group">
                                {!! Form::label('animal' ,'Animal') !!}<br>
                                {!! Form::text('id_animales', $animal->DIIO, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required','disabled' ]) !!}
                            </div>
                        </td>
                        {{ Form::close() }}
                        {{ Form::open(['route' => 'admin.historiales.store', 'method' => 'POST']) }}
                        <td><div class="form-group">
                            {!! Form::label('enfermedad' ,'Diagnostico') !!}
                            {!! Form::text('enfermedad', null, ['class' => 'form-control', 'placeholder' => 'Enfermedad del Animal' , 'required' ]) !!}
                        </div></td>
                        <div class="form-group">
                            {!! Form::label('fecha' ,'Fecha de Diagnostico') !!}<br>
                            {!! Form::date('fecha', $fecha) !!}
                        </div>
                        <td><div class="form-group">
                            {!! Form::hidden('id_animales', $animal->id , null , ['class'=>'form-control']) !!}
                        </div></td>

                        <td class="form-group">
                            {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                        </td>
                        {{ Form::close() }}
                    </tr>
                </div>
            </div>
        </div>
    </div>
@endsection