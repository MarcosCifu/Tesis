@extends('template')
@section('content')
    @include('errors')
    <div class="box">
        <div class="box-header">
            <h4>Listado de Historiales Medicos</h4>
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
                    <th>Animal</th>
                    <th>Diagnostico</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                @foreach($historiales as $historial)
                    <tr>
                        <td>{{$historial->animal->DIIO}}</td>
                        <td>{{$historial->enfermedad}}</td>
                        <td>{{$historial->created_at->diffForHumans()}}</td>
                        <td> @if($historial->animal->estado == "vivo")
                                <span class="label label-success">{{$historial->animal->estado}}</span>
                            @else
                                @if($historial->animal->estado == "muerto")
                                    <span class="label label-danger">{{$historial->animal->estado}}</span>
                                @else
                                    <span class="label label-warning">{{$historial->animal->estado}}</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.historiales.edit', $historial->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                            <a href="{{ route('admin.historiales.destroy', $historial->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este diagnostico?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <a href="{{route('admin.historiales.create')}}" class="btn btn-info">Registar nuevo Historial</a><hr>
    {!! $historiales->render() !!}
@endsection