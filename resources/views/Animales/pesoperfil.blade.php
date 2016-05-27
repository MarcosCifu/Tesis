@extends('template')
@section('content')
    @include('errors')
    <div class="box">
        <div class="box-header">
            <h4>Ingresar Nuevo Pesaje</h4>
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
                    {{ Form::model($animal,['route' => ['admin.animales.update', $animal->id], 'method' => 'PUT']) }}
                    <td>
                        <div class="form-group">
                            {!! Form::label('animal' ,'Animal') !!}
                            {!! Form::text('id_animales', $animal->DIIO, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required' ]) !!}
                        </div>
                    </td>
                    {{ Form::close() }}
                    {{ Form::open(['route' => 'admin.pesos.store', 'method' => 'POST']) }}
                    <td><div class="form-group">
                            {!! Form::label('pesaje' ,'Pesaje') !!}
                            {!! Form::text('pesaje', null, ['class' => 'form-control', 'placeholder' => 'Pesaje del Animal' , 'required' ]) !!}
                        </div></td>
                    <td><div class="form-group">
                            {!! Form::label('fecha' ,'Fecha del Pesaje') !!}<br>
                            {!! Form::date('fecha', $fecha) !!}
                        </div></td>
                    <td><div class="form-group">
                        {!! Form::hidden('id_animales', $animal->id , null , ['class'=>'form-control']) !!}

                    </div></td>
                    <td class="form-group">
                        {!! Form::submit('Registrar' ,['class' => 'btn btn-primary']) !!}
                    </td>
                    {{ Form::close() }}
                </tr>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection