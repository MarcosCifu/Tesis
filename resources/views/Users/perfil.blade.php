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
                    <img class="profile-user-img img-responsive img-circle" src="https://s3-us-west-2.amazonaws.com/ancalibeef/{{$user->path}}" alt="User profile picture">
                     <h3 class="profile-username text-center">{{$user->name}}</h3>
                    @if($user->type == 'admin')
                        <p class="text-muted text-center">Administrador</p>
                        @else
                        <p class="text-muted text-center">Miembro</p>
                    @endif
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Registrado desde</b> <a class="pull-right">{{$user->created_at->format('d/m/Y')}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Animales registrados</b> <a class="pull-right">{{$user->animals->count()}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Animales vendidos</b> <a class="pull-right">{{$user->animals->where("venta",1)->count()}}</a>
                        </li>
                    </ul>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-block"><b>Editar</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection