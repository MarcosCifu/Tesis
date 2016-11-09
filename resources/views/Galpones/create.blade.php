<div id="form">
    <div class="box box-primary">
        <div class="box-body">
            <section>
                {{ Form::open(['route' => 'admin.galpones.store', 'method' => 'POST']) }}
                <div class="form-group">
                    {!! Form::label('numero' ,'Número') !!}
                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Galpón' , 'required' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cantidad_corrales' ,'Cantidad Estimada de Corrales') !!}
                    {!! Form::text('cantidad_corrales', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Estimada de Corrales' , 'required' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                 </div>
                {{ Form::close() }}
            </section>
        </div>
    </div>
</div>
