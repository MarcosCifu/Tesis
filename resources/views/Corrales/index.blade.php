@extends('template')

@section('content')
    @include('errors')
            <div class="box">
                <div class="box-header">
                    <h4>Listado de Corales</h4>
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
                            <th>Número</th>
                            <th>Cantidad Estimada</th>
                            <th>Galpón</th>
                            <th>Acción</th>
                        </tr>
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
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    <a href="{{route('admin.corrales.create')}}" class="btn btn-primary">Registar nuevo corral</a><hr>
    {!! $corrales->render() !!}
@endsection