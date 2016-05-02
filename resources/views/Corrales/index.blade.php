@extends('template')
@section('title','Listado de Corrales')

@section('content')
    @include('errors')
    {!! Form::open(['route'=>'admin.corrales.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ]) !!}
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn"><button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button></span>
    </div>
    {!! Form::close() !!}
    <a href="{{route('admin.corrales.create')}}" class="btn btn-info">Registar nuevo corral</a><hr>


    <table class="table table-striped">
        <thead>
        <th>Número</th>
        <th>Cantidad Estimada</th>
        <th>Galpón</th>
        <th>Acción</th>
        </thead>
        <tbody>
        @foreach($corrales as $corral)
            <tr>
                <td>{{$corral->numero}}</td>
                <td>{{$corral->cantidad}}</td>
                <td>{{$corral->galpon->numero}}</td>
                <td>
                    <a href="{{ route('admin.corrales.edit', $corral->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                    <a href="{{ route('admin.corrales.destroy', $corral->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este corral?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $corrales->render() !!}
@endsection