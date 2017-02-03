{{ Form::open(['route' => 'admin.precios.store', 'method' => 'POST','id' => 'registrarprecio', 'data-parsley-validate' =>'']) }}
    <div class="form-group">
        {!! Form::label('type','Animal') !!}
        {!! Form::select('tipo',[ 'Vaca' => 'Vaca' , 'Novillo' => 'Novillo', 'Vaquilla' => 'Vaquilla' , 'Ternero' => 'Ternero', 'Ternera' => 'Ternera'],null,['class'=> 'form-control', 'placeholder' => 'Seleccione un tipo' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('valor' ,'Valor') !!}
        {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Valor por Kilo' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha' ,'Fecha del Valor') !!}<br>
        {!! Form::date('fecha', $fecha) !!}
    </div>
    <td class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
    </td>
{{ Form::close() }}
