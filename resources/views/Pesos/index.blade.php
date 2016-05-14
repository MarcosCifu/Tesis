@extends('template')
@section('content')
    @include('errors')
    <div class="animated flipInY">
        <div class="box-tools">
            {!! Form::open(['route'=>'admin.pesos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ]) !!}
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn"><button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button></span>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box">
            <div class="box-header">
                <h3>Listado de Pesajes</h3>
                <a href="{{route('admin.pesos.create')}}" class="btn btn-info btn-lg"><i class="fa fa-folder-open-o"></i> Registar nuevo Peso</a><hr>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>Animal</th>
                    <th>Pesaje</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
                @foreach($pesos as $peso)
                    <tr>
                        <td>{{$peso->animal->DIIO}}</td>
                        <td>{{$peso->pesaje}}</td>
                        <td>{{$peso->fecha}}</td>
                        <td>
                            <a href="{{ route('admin.pesos.edit', $peso->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                            <a href="{{ route('admin.pesos.destroy', $peso->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                        </td>

                    </tr>
                @endforeach
            </table>
            {!! $pesos->render() !!}
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection