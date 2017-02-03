@extends ('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Usuario</b></h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST','id' => 'form-register', 'data-parsley-validate' =>'', 'files'=>true]) !!}

                    <div class="form-group">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null,['class'=> 'form-control','placeholder' => 'Nombre Completo' ,'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Correo Electronico') !!}
                        {!! Form::email('email',null,['class'=> 'form-control','placeholder' => 'example@email.com' ,'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Contraseña') !!}
                        {!! Form::password('password',['class'=> 'form-control','placeholder' => '***********' ,'required']) !!}
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
                        {!! Form::submit('Registrar', ['class' => 'btn btn-success'])!!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div id="msj-success" class="alert alert-success alert-dismissable" role="alert" style="display:none">
        <strong> Usuario creado con exito!</strong>
    </div>
    <div id="msj-danger" class="alert alert-danger alert-dismissable" role="alert" style="display:none">
        <strong> Usuario eliminado con exito!</strong>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Usuarios</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                        Registar nuevo <b>Usuario</b> &nbsp;<i class="fa fa-user"></i>
                    </a>
                </div><!-- /.box-header -->
            <div class="box-body">
                <table id="users" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Registrado desde:</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr data-id = "{{ $user->id }}">
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
                                    {{$user->created_at->format('Y-m-d')}}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><span    class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>


                                    <a href="#!" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><span  class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div><!-- /.box-body -->
        </div>
    </div>
    {!! Form::open(['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::close() !!}
@endsection

@section('tablejs')
    <script>
        $(function () {
            $('#users').DataTable({
                "info": false,
                "scrollX" : true,
                "order": [4,"desc"],
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
    <script>
        $(document).ready(function () {
            $('.btn-danger').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();
                row.fadeOut();


                $.post(url,data,function (result) {
                    $('#msj-danger').fadeIn();
                    $('#msj-danger').delay(1600).fadeOut();


                }).fail(function () {
                    alert('El usuario no pudo ser eliminado');
                    row.show();

                });



            })
        });
    </script>
    <script>
        $('#form-register').parsley();

    </script>
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
            // other options
        });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endsection
