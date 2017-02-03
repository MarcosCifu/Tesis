{{ Form::open(['route' => 'admin.pesos.store', 'method' => 'POST','id' => 'registrarpeso', 'data-parsley-validate' =>'']) }}
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
        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
    </td>
{{ Form::close() }}
