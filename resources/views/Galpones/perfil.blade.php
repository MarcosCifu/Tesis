@extends('template')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="registrarcorral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="box box-primary box-solid">
                <div class="box-header with-border" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Información del <b>Corral</b></h3>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => 'admin.corrales.store', 'method' => 'POST']) }}
                    <div class="form-group">
                        {!! Form::label('numero' ,'Número') !!}
                        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero del Corral' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('numeroGalpon' ,'Galpón') !!}
                        {!! Form::text('numeroGalpon', $galpon->numero, ['disabled' => 'disabled','class' => 'form-control', 'placeholder' => 'Seleccione una opción' , 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tamaño' ,'Tamaño') !!}
                        {!! Form::text('tamaño', null, ['class' => 'form-control', 'placeholder' => 'Tamaño en m2' , 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('atributos' ,'Atributos') !!}
                        {!! Form::select('atributos[]', $atributos, null, ['class' => 'form-control select-atributo' ,'multiple', 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Registrar' ,['class' => 'btn btn-success']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('id_galpon', $galpon->id , null , ['class'=>'form-control']) !!}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default animated pulse slow go">
                <div class="panel-heading">
                    <h1>Información del <b>Galpón</b></h1>
                </div>
                <div class="panel-body">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion ion-ios-paw"></i>
                            </div>
                            <div>
                            <h2 class="text-center">Galpón Número</h2>
                            <h3 class="profile-username text-center">{{$galpon->numero}}</h3>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Fecha de creación</b>
                            <b class="pull-right">{{$galpon->created_at->format('d/m/Y')}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>Tamaño</b>
                            <b class="pull-right">{{$tamaño}} m2</b>
                        </li>
                        <li class="list-group-item">
                            <b>Cantidad de Animales</b>
                            @if($animales == 0)
                                <span class="label label-success pull-right">{{$animales}}</span>
                            @else
                                @if($animales/($tamaño/3) < 0.7)
                                    <span class="label label-primary pull-right">{{$animales}}</span>
                                @else
                                    @if($animales/($tamaño/3) < 0.9)
                                        <span class="label label-warning pull-right">{{$animales}}</span>
                                    @else
                                        <span class="label label-danger pull-right">{{$animales}}</span>
                                    @endif
                                @endif
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de Animales</b> <a class="pull-right"></a>
                            @foreach($tipoanimales as $tipo)
                                <span class="badge pull-right"> {{$tipo}} </span>
                            @endforeach
                        </li>

                        @if(Auth::user()->admin())
                            <li class="list-group-item">
                                <b>Actualizar Estadisticas</b>
                                  <a href="{{ route('admin.estadisticasgalpones', $galpon->id)}}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-signal"></span></a>
                                <div>
                                    <br>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 animated pulse slow go">
            <div class="row tile_count">
                <div class="animated flipInX col-lg-4 col-xs-4 tile_stats_count">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$promedio}}<sup style="font-size: 20px">KG</sup></h3>
                            <p>Pesaje Promedio</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-speedometer"></i>
                        </div>
                    </div>
                </div>
                <div class="animated flipInX col-lg-4 col-xs-4 tile_stats_count">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$minimo}}<sup style="font-size: 20px">KG</sup></h3>
                            <p>Pesaje Minimo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-graph-down-right"></i>
                        </div>
                    </div>
                </div>
                <div class="animated flipInX col-lg-4 col-xs-4 tile_stats_count">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$maximo}}<sup style="font-size: 20px">KG</sup></h3>
                            <p>Pesaje Maximo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-graph-up-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#resumen" data-toggle="tab">Evolución</a></li>
                    <li><a href="#corrales" data-toggle="tab">Corrales</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="resumen">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="box-header">
                                        <h3>Resumen <b>Evolutivo</b></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Evolución</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="chart">
                                                        <canvas id="areaChart" style="height:250px"></canvas>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div><!-- /.nav-tabs-custom -->
                    </div>
                    <div class="tab-pane fade" id="corrales">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="box-header">
                                        <h3>Listado de <b>Corrales</b></h3>
                                        @if(Auth::user()->admin())
                                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarcorral"><spam  class="fa fa-tags" aria-hidden="true"></spam>&nbsp; &nbsp;Registar <b>Corral</b> </a>
                                        @endif()
                                    </div><!-- /.box-header -->
                                    <table id="corrales" class="table table-bordered table">
                                        <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Cantidad actual de Animales</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($galpon->corrales as $corral)
                                            <tr>
                                                <td><a href="{{ route('admin.corrales.perfil', $corral->id) }}" class="badge">Corral {{$corral->numero}}</a></td>
                                                <td>
                                                    @if($corral->cantidad_animales == 0)
                                                        <span class="label label-success">{{$corral->cantidad_animales}}</span>
                                                    @else
                                                        @if($corral->cantidad_animales/($corral->tamaño/3) < 0.7)
                                                            <span class="label label-primary">{{$corral->cantidad_animales}}</span>
                                                        @else
                                                            @if($corral->cantidad_animales/($corral->tamaño/3) < 0.9)
                                                                <span class="label label-warning">{{$corral->cantidad_animales}}</span>
                                                            @else
                                                                <span class="label label-danger">{{$corral->cantidad_animales}}</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                                @if(Auth::user()->admin())
                                                    <td>
                                                        <a href="{{ route('admin.corrales.edit', $corral->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                                        <a href="{{ route('admin.corrales.destroy', $corral->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
                                                    </td>
                                                @endif()
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    </div>

            </div>
        </div>


@endsection

@section('chartjs')
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas);

            var areaChartData = {
                labels: {!! ($fechaevolucion) !!},
                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: {!! ($evolucion) !!}

                    }
                ]
            };

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: true,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: true,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true

            };

            //Create the line chart
            areaChart.Line(areaChartData, areaChartOptions);




            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas);
            var barChartData = {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre", "Noviembre","Diciembre"],
                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "#00a65a",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [454, 510, 490, 505, 560 , 601, 580]
                    }
                ]
            };
            var barChartOptions = {
                //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                scaleBeginAtZero: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: true,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - If there is a stroke on each bar
                barShowStroke: true,
                //Number - Pixel width of the bar stroke
                barStrokeWidth: 2,
                //Number - Spacing between each of the X value sets
                barValueSpacing: 5,
                //Number - Spacing between data sets within X values
                barDatasetSpacing: 1,
                //String - A legend template
                //Boolean - whether to make the chart responsive
                responsive: true,
                maintainAspectRatio: true
            };

            barChartOptions.datasetFill = false;
            barChart.Bar(barChartData, barChartOptions);
        });
    </script>
@endsection
@section('tablejs')
    <script>
        $(function () {
            $('#corrales').DataTable({
                "info": false,
                "oSearch": { "bSmart": false, "bRegex": true },
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
                $('#registrarcorral').on('shown.bs.modal', function () {
                    $('.select-atributo').chosen({
                        placeholder_text_multiple:'Seleccione atributos del corral'
                    });
                });
            </script>
@endsection