@extends('template')
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default animated pulse slow go">
                <div class="panel-heading">
                    <h1>Información del <b>Usuario</b></h1>
                </div>
                <div class="panel-body">

                            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'files'=>true]) !!}

                            <div class="form-group">
                                {!! Form::label('name','Nombre') !!}
                                {!! Form::text('name',null,['class'=> 'form-control','placeholder' => 'Nombre Completo' ,'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email','Correo Electronico') !!}
                                {!! Form::email('email',null,['class'=> 'form-control','placeholder' => 'example@email.com' ,'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('type','Tipo') !!}
                                {!! Form::select('type',[ 'member' => 'Miembro' , 'admin' => 'Administrador'],null,['class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen del Usuario') !!}
                                {!! Form::file('path') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection