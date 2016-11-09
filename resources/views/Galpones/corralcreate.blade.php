
    {{ Form::open(['route' => 'admin.corrales.store', 'method' => 'POST']) }}
        <div class="form-group">
            {!! Form::label('numero' ,'Número') !!}
            {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Corral' , 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('id_galpon' ,'Galpón') !!}
            {!! Form::text('id_galpon', $galpon->numero, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('atributos' ,'Atributos') !!}
            {!! Form::select('atributos[]', $atributos, null, ['class' => 'form-control select-atributo' ,'multiple', 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
        </div>
    {{ Form::close() }}

