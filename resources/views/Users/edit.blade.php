@extends('template')
@section('content')
    @include('errors')
    <div id="form">
        <div class="row">
            <div class="col-lg-5">
                <div class="box box-primary animated pulse slow go">
                    <div class="box-body">
                        <h3>Información del <b>Usuario: {{$user->name}}</b></h3>
                        <section>
                            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

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
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection