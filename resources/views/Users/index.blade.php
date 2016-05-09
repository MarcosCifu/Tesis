@extends ('template')
@section('content')
    @include('errors')
            <div class="box">
                <div class="box-header">
                    <h4>Lista de Usuarios</h4>
                    <div class="box-tools">
                        {!! Form::open(['route'=>'admin.corrales.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ]) !!}
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn"><button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->type == "admin")
                                        <span class="label label-success">{{$user->type}}</span>
                                    @else
                                        <span class="label label-primary">{{$user->type}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                    <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este usuario?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    <a href="{{route('admin.users.create')}}" class="btn btn-info">Registar nuevo usuario</a><hr>
    {!! $users->render() !!}
@endsection