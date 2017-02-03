<div class="box-body">
    {{ Form::open(['route' => 'admin.atributos.store', 'method' => 'POST','data-parsley' =>'', 'id' => 'registraratributo']) }}
    <div class="form-group">
        {!! Form::label('nombre' ,'Nombre del Atributo') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del atributo' , 'required' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}

    </div>
    {{ Form::close() }}
</div>