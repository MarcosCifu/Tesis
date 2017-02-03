{{ Form::open(['route' => 'admin.galpones.store', 'method' => 'POST','id' => 'registrargalpon', 'data-parsley-validate' =>'']) }}
    <div class="form-group">
        {!! Form::label('numero' ,'Número') !!}
        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Galpón' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
    </div>
{{ Form::close() }}
