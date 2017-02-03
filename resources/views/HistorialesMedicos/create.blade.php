{{ Form::open(['route' => 'admin.historiales.store', 'method' => 'POST','id' => 'registrarhistorial', 'data-parsley-validate' =>'']) }}
    <div class="form-group">
        {!! Form::label('animales' ,'Animal') !!}
        {!! Form::select('id_animales', $animales, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('enfermedad' ,'Diagnostico') !!}
        {!! Form::text('enfermedad', null, ['class' => 'form-control', 'placeholder' => 'Enfermedad del Animal' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tratamiento' ,'Tratamiento') !!}
        {!! Form::text('tratamiento', null, ['class' => 'form-control', 'placeholder' => 'Tratamiento para la enfermedad del Animal']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estado_tratamiento' ,'Estado del tratamiento') !!}
        {!! Form::select('estado_tratamiento',[ 'En tratamiento' => 'En tratamiento' , 'Tratamiento terminado' => 'Tratamiento terminado', 'Tratamiento no comenzado' => 'Tratamiento no comenzado'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un estado' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha' ,'Fecha de Diagnostico') !!}<br>
        {!! Form::date('fecha', $fecha) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}

    </div>
{{ Form::close() }}
