@extends('template')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Animal</b></h3>
                </div>
                <div class="modal-body">
                    @include('Animales.create')
                </div>
            </div>
        </div>
    </div>
    <!--<button type="button" class="btn btn-primary btn-lg animated pulse slow go" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-folder-open-o"></i> Registar nuevo Animal
    </button>
    -->
    <a class="btn btn-primary animated pulse slow go" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-folder-open-o"></i> Registar nuevo Animal
    </a>
    <div class="collapse" id="collapseExample">
        <div class="well">
            <div id="example-basic">
                <h3>Keyboard</h3>
                <section>
                    <p>Try the keyboard navigation by clicking arrow left or right!</p>
                </section>
                <h3>Effects</h3>
                <section>
                    <p>Wonderful transition effects.</p>
                </section>
                <h3>Pager</h3>
                <section>
                    <p>The next and previous buttons help you to navigate through your content.</p>
                </section>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Datos del <b>Animal</b></h4>
                </div>
                <div class="modal-body">
                    @include('Animales.create')
                </div>
            </div>
        </div>
    </div>

    <div class="animated pulse slow go">
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#registrar">
                    <i class="fa fa-folder-open-o"></i> Registar nuevo Animal
                </button>
                <h3>Listado de <b>Animales</b></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="animales" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Numero de Guia</th>
                            <th>DIIO</th>
                            <th>Tipo</th>
                            <th>Galpón</th>
                            <th>Corral</th>
                            <th>Estado</th>
                            <th>Fecha Ingreso</th>
                            <th>Ultimo Pesaje</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($animales as $animal)
                        @foreach($animal->users as $origen)
                        <tr>
                            <td>{{$origen->pivot->numero_Guia or "Desconocido"}}</td>
                            <td><a href="{{ route('admin.animales.perfil', $animal->id) }}">{{$animal->DIIO}}</a></td>
                            <td>{{$animal->tipo}}</td>
                            <td>Galpón {{$animal->corral->galpon->numero}}</td>
                            <td>Corral {{$animal->corral->numero}}</td>
                            <td>
                                @if($animal->estado == "Vivo")
                                    <span class="label label-success">{{$animal->estado}}</span>
                                @else
                                    @if($animal->estado == "Muerto")
                                        <span class="label label-danger">{{$animal->estado}}</span>
                                    @else
                                        <span class="label label-warning">{{$animal->estado}}</span>
                                    @endif
                                @endif
                            </td>
                            <td>{{$animal->created_at->format('m/Y')}}</td>
                            <td>{!! $animal->ultimopeso->pesaje or "0"!!}</td>
                            <td>
                                <a href="{{ route('admin.animales.edit', $animal->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                <a href="{{ route('admin.animales.destroy', $animal->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este animal?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                            </td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#animales').DataTable({
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
                },
                "lengthMenu": [[10, 20, -1], [10, 20, "Todos"]]
            });
        });
    </script>
@endsection
@section('ajaxjs')
    <script>
        $("#example-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true
        });
    </script>
@endsection