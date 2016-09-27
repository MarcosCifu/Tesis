<div id="form">
    <div class="box box-primary">
        <div class="box-body">
            <section>
                {{ Form::open(['route' => 'admin.precios.store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {!! Form::label('valor' ,'Valor') !!}
                        {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Valor por Kilo' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha' ,'Fecha del Valor') !!}<br>
                        {!! Form::date('fecha', $fecha) !!}
                    </div>
                    <td class="form-group">
                        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                    </td>
                {{ Form::close() }}
            </section>
        </div>
    </div>
</div>
