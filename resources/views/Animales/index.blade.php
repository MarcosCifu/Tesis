@extends('template')
@section('title','Listado de Animales')

@section('content')
    @include('errors')
    {!! Form::open(['route'=>'admin.animales.index', 'method' => 'POST', 'class' => 'navbar-form pull-right' ]) !!}
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn"><button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button></span>
    </div>
    {!! Form::close() !!}
    <a href="{{route('admin.animales.create')}}" class="btn btn-info">Registar nuevo Animal</a><hr>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <th>Numero de Guia</th>
        <th>DIIO</th>
        <th>Tipo</th>
        <th>Galpón</th>
        <th>Corral</th>
        <th>Historiales Medicos</th>
        <th>Estado</th>
        <th>Acción</th>
        </thead>
        <tbody>
        @foreach($animales as $animal)
            <tr>
                <td>{{$animal->numero_Guia}}</td>
                <td>{{$animal->DIIO}}</td>
                <td>{{$animal->tipo}}</td>
                <td>{{$animal->corral->galpon->numero}}</td>
                <td>{{$animal->corral->numero}}</td>
                <td>{{$animal->historiales_medicos}}</td>
                <td> @if($animal->estado == "vivo")
                        <span class="label label-success">{{$animal->estado}}</span>
                    @else
                         @if($animal->estado == "muerto")
                           <span class="label label-danger">{{$animal->estado}}</span>
                        @else
                            <span class="label label-warning">{{$animal->estado}}</span>
                        @endif
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.animales.edit', $animal->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                    <a href="{{ route('admin.animales.destroy', $animal->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este animal?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    {!! $animales->render() !!}
@endsection