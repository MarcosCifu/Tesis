@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Información del Galpón</h3>
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
        </div>
    </div>


@endsection
@section('ajaxjs')
    <script>
        $("#form").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    </script>
@endsection