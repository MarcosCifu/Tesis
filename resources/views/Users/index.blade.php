@extends ('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Usuario</b></h3>
                </div>
                <div class="modal-body">
                    @include('Users.create')
                </div>
            </div>
        </div>
    </div>
    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#registrar">
                    <i class="fa fa-folder-open-o"></i> Registar nuevo Usuario
                </button>

                <h3>Listado de <b>Usuarios</b></h3>
                </div><!-- /.box-header -->
            <div class="box-body">
                <table id="users" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
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
                "scrollX" : true,
                "language": {
                    "emptyTable": "No hay datos disponibles",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "lengthMenu": "Mostrar _MENU_ entradas"
                }
            });
        });
    </script>
@endsection
