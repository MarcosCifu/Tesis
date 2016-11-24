@extends('layouts.app')
@section('titulo','asistencia')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">confirmar asistencia</div>
             
                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                    @endif

                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => 'asistencia.store',  'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('id_alumno', 'Alumno') !!}
                            {!! Form::select('id_alumno',$alumnos,null,['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('asiste', 'Asistecia',['class'=>'control-label']) !!}
                            {!! Form::select('asiste', ['seleccione su asistencia','si' => 'si asiste', 'no' => 'no asiste']) !!}
                        </div>
                       
                        <div class="form-group">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection