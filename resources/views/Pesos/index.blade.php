@extends('template')
@section('content')
    @include('errors')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Pesaje</b></h3>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => 'admin.pesos.store', 'method' => 'POST','id' => 'registrarpeso', 'data-parsley-validate' =>'']) }}
                    <td>
                        <div class="form-group">
                            {!! Form::label('animales' ,'Animal') !!}
                            {!! Form::select('id_animales', $animales, null, ['class' => 'form-control select-animal', 'placeholder' => 'Seleccione un animal' , 'required' ]) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::label('pesaje' ,'Pesaje') !!}
                            {!! Form::text('pesaje', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del Animal' , 'required' ]) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::label('fecha' ,'Fecha del Pesaje') !!}<br>
                            {!! Form::date('fecha', $fecha) !!}
                        </div>
                    </td>
                    <td class="form-group">
                        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
                    </td>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Listado de <b>Pesajes</b></h1>
        </div>
        <div class="panel-body">
                <div class="box-header">
                    @if(Auth::user()->admin())
                        <a  type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar">
                            Registar nuevo <b>Pesaje</b> &nbsp;<i class="glyphicon glyphicon-scale"></i>
                        </a>
                    @endif()
                        <a href="{{ route('admin.ultimospesos') }}" type="button" class="btn btn-primary">
                            Ultimos <b>Pesajes</b> &nbsp;<i class="glyphicon glyphicon-scale"></i>
                        </a>
                </div><!-- /.box-header -->
                <div class="box-body ">
                    <table id="pesos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Animal</th>
                            <th>Pesaje</th>
                            <th>Fecha</th>
                            @if(Auth::user()->admin())
                            <th>Acción</th>
                            @endif()
                        </tr>
                        <tbody>

                            @foreach($pesos as $peso)
                                <tr>
                                    <td><a href="{{ route('admin.animales.perfil', $peso->animal->id) }}"><span class="badge">{{$peso->animal->DIIO}}</span></a></td>
                                    <td><b>{{$peso->pesaje}} KG</b></td>
                                    <td>{{$peso->fecha}}</td>
                                    @if(Auth::user()->admin())
                                    <td>
                                        <a href="{{ route('admin.pesos.edit', $peso->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                        <a href="{{ route('admin.pesos.destroy', $peso->id) }}" class="btn btn-danger" data-toggle="confirmation" data-title="Esta Seguro?" data-btn-ok-label=" Si" data-btn-cancel-label="No"><spam class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                    </td>
                                    @endif()
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
        </div>
    </div>
@endsection
@section('tablejs')
    <script>
        $('#registrar').on('shown.bs.modal', function () {
            $('.select-animal').chosen({
                placeholder_text_multiple:'Seleccione un animal',
                no_results_text: "Oops, animal no encontrado!"
            });
        });
    </script>
    <script>
        $(function () {
            $('#pesos').DataTable({
                "info": false,
                "scrollX" : true,
                "oSearch": { "bSmart": false, "bRegex": true },
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
                },
                "lengthMenu": [[10, 20, -1], [10, 20, "Todos"]]
            });
        });
    </script>
    <script>
        $('#registrarpeso').parsley();

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