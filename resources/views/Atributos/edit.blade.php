@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary animated pulse slow go">
                    <div class="box-body">
                        <h3>Información del <b>Atributo</b></h3>
                        <section>
                            {{ Form::open(['route' => 'admin.atributos.store', 'method' => 'POST']) }}
                            <div class="form-group">
                                {!! Form::label('nombre' ,'Nombre del Atributo') !!}
                                {!! Form::text('nombre', $atributo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del atributo' , 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Actualizar' ,['class' => 'btn btn-primary']) !!}

                            </div>
                            {{ Form::close() }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection