@extends('template')
@section('content')
    @include('errors')
    <div class="box-tools">
        {!! Form::open(['route'=>'admin.corrales.index', 'method' => 'GET', 'class' => 'navbar-form pull-right' ]) !!}
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn"><button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button></span>
        </div>
        {!! Form::close() !!}
    </div>
            <div class="box">
                <div class="box-header">
                    <h4>Listado de Materiales</h4>

                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Número</th>
                            <th>Nombre</th>
                            <th>UMB</th>
                            <th>Cantidad</th>
                            <th>Observación</th>
                            <th>Acción</th>
                        </tr>
                        @foreach($materiales as $material)
                            <tr>
                                <td>{{$material->numero}}</td>
                                <td>{{$material->nombre}}</td>
                                <td>{{$material->umb}}</td>
                                <td> @if($material->cantidad > 20)
                                        <span class="label label-success">{{$material->cantidad}}</span>
                                    @else
                                        @if($material->cantidad < 5)
                                            <span class="label label-danger">{{$material->cantidad}}</span>
                                        @else
                                            <span class="label label-warning">{{$material->cantidad}}</span>
                                        @endif
                                    @endif
                                </td>
                                <td>{{$material->observacion}}</td>
                                <td>
                                    <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>


                                    <a href="{{ route('admin.materiales.destroy', $material->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este material?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    <a href="{{route('admin.materiales.create')}}" class="btn btn-info">Registar nuevo Material</a><hr>
    {!! $materiales->render() !!}
@endsection