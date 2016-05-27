@extends('template')
@section('content')
    @include('errors')
    <div class="animated flipInY">
        <div class="box">
            <div class="box-header">
                <h3>Listado de Pesajes</h3>
                <a href="{{route('admin.pesos.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Pesaje</a>
            </div><!-- /.box-header -->
            <div class="box-body ">
                <table id="pesos" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Pesaje</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                    <tbody>
                        @foreach($pesos as $peso)
                            <tr>
                                <td><a href="{{ route('admin.animales.perfil', $peso->animal->id) }}">{{$peso->animal->DIIO}}</a></td>
                                <td>{{$peso->pesaje}}</td>
                                <td>{{$peso->fecha}}</td>
                                <td>
                                    <a href="{{ route('admin.pesos.edit', $peso->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                    <a href="{{ route('admin.pesos.destroy', $peso->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>

                            </tr>
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
            $('#pesos').DataTable({
                "info": false,
                "scrollX" : true,
                "lengthMenu": [[5,10, 20, -1], [5,10, 20, "Todos"]]
            });
        });
    </script>
@endsection