@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="panel panel-default animated pulse slow go">
                    <div class="panel-heading">
                        <h1>Información del <b>Galpón</b></h1>
                    </div>
                    <div class="panel-body">
                        <section>
                            {!! Form::model($galpon, ['route' => ['admin.galpones.update', $galpon->id], 'method' => 'PUT']) !!}

                            <div class="form-group">
                                {!! Form::label('numero' ,'Número') !!}
                                {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Galpón' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Guardar' ,['class' => 'btn btn-success']) !!}

                            </div>

                            {!! Form::close() !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection