@extends ('template')
@section('content')
    @include('errors')
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <h3>Listado de <b>Usuarios</b></h3>
                <a href="{{route('admin.users.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Usuario</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="users" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    {!! $users->render() !!}
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#users').DataTable({
                "info": false,
                "scrollX" : true

            });
        });
    </script>
@endsection
