@extends('template')
@section('title','Listado de Galpones')

@section('content')
    @include('errors')
    <a href="{{route('admin.galpones.create')}}" class="btn btn-info">Registar nuevo galpón</a><hr>
    <table class="table table-striped">
        <thead>
        <th>Número</th>
        <th>Cantidad Estimada</th>
        <th>Acción</th>
        </thead>
        <tbody>
        @foreach($galpones as $galpon)
            <tr>
                <td>{{$galpon->numero}}</td>
                <td>{{$galpon->cantidad}}</td>
                <td>
                    <a href="{{ route('admin.galpones.edit', $galpon->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                    <a href="{{ route('admin.galpones.destroy', $galpon->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este usuario?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $galpones->render() !!}
@endsection