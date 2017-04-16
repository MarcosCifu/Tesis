@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default animated pulse slow go">
                <div class="panel-heading">
                    <h1>Información del <b>Corral</b></h1>
                </div>
                <div class="panel-body">
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion ion-ios-paw"></i>
                            </div>
                            <h2 class="text-center">Corral Número</h2>
                            <h3 class="profile-username text-center">{{$corrales->numero}}</h3>
                        </div>
                    </div>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Fecha de creación</b>
                            <b class="  pull-right">{{$corrales->created_at->format('d/m/Y')}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>Tamaño</b>
                            <b class="  pull-right">{{$corrales->tamaño}} m2</b>
                        </li>
                        <li class="list-group-item">
                            <b>Cantidad de Animales</b>
                            @if($corrales->cantidad_animales == 0)
                                <span class="label label-success pull-right">{{$corrales->cantidad_animales}}</span>
                            @else
                                @if($corrales->cantidad_animales/($corrales->tamaño/3) < 0.7)
                                    <span class="label label-primary pull-right">{{$corrales->cantidad_animales}}</span>
                                @else
                                    @if($corrales->cantidad_animales/($corrales->tamaño/3) < 0.9)
                                        <span class="label label-warning pull-right">{{$corrales->cantidad_animales}}</span>
                                    @else
                                        <span class="label label-danger pull-right">{{$corrales->cantidad_animales}}</span>
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
                        <li class="list-group-item">
                            <b>Atributos del Corral</b>
                            @foreach($atributos as $atributo)
                                <span class="badge pull-right">{{$atributo->nombre}}</span>
                            @endforeach
                            <br>
                            <br>
                        </li>
                        @if(Auth::user()->admin())
                        <li class="list-group-item">
                            <b>Actualizar Estadisticas</b>
                            <a href="{{ route('admin.estadisticascorrales', $corrales->id)}}" class="btn btn-primary pull-right"><span  class="glyphicon glyphicon-signal"></span></a>
                            <div>
                                <br>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
                <!-- DONUT CHART -->
                <div class="box box-danger animated pulse slow go">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estado de los <b>Animales</b></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" style="height:250px"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="chart-legend clearfix pull-left">
                                    <li><i class="fa fa-circle-o text-green"></i> Vivos</li>
                                    <li><i class="fa fa-circle-o text-yellow"></i> Enfermos</li>
                                    <li><i class="fa fa-circle-o text-red"></i> Muertos</li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="chart-legend clearfix pull-left">
                                    @if($enfermos > 0)
                                        <li>
                                            Tipo con mas <span class="label label-warning">&nbsp;Enfermos : </span> <span class="badge"> &nbsp;{{$tipomasenfermos}}</span>
                                            &nbsp;<span class="pull-right text-yellow">{{round(($cantidadtipomasenfermos*100)/$enfermos,2)}}%</span>

                                        </li>
                                    @endif
                                    @if($muertos > 0)
                                        <li>
                                            Tipo con mas <span class="label label-danger">&nbsp;Muertos : </span> <span class="badge">&nbsp;{{$tipomasmuertos}}</span>
                                            &nbsp;<span class="pull-right text-red">{{round(($cantidadtipomasmuertos*100)/$muertos,2)}}%</span>

                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">

                        </ul>
                    </div>
                    <!-- /.footer -->
                </div><!-- /.box -->
        </div>


        <div class="col-md-8">
            <div class="row tile_count">
                <div class="animated flipInX col-lg-4 col-xs-4 tile_stats_count">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{round($pesajepromedio,1)}}<sup style="font-size: 20px">KG</sup></h3>
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
                            <h3>{{$pesajeminimo or 0}}<sup style="font-size: 20px">KG</sup></h3>
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
                            <h3>{{$pesajemaximo or 0}}<sup style="font-size: 20px">KG</sup></h3>
                            <p>Pesaje Maximo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-graph-up-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        <div class="nav-tabs-custom animated pulse slow go">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#resumen" data-toggle="tab">Estadisticas</a></li>
                <li><a href="#animales" data-toggle="tab">Animales</a></li>
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
                                    <div class="col-md-12">

                                            <div class="box-header with-border">
                                                <h3 class="box-title">Beneficios</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="chart">
                                                    <canvas id="barChart" style="height:230px"></canvas>
                                                </div>
                                            </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="animales">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="box-header">
                                    <h3>Listado de <b>Animales</b></h3>
                                    @if(Auth::user()->admin())
                                    <div>
                                        <a href="{{route('admin.corrales.animalcorral', $corrales->id)}}" class="btn btn-success"><spam class="fa fa-paw"></spam>&nbsp; &nbsp; Registar <b>Animal</b></a>
                                    </div>
                                    @endif()
                                </div>
                                <div class="box-body">
                                    <table id="animal" class="table table-bordered table">
                                        <thead>
                                        <tr>
                                            <th>DIIO</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>Peso</th>
                                            <th>Ingreso</th>
                                            @if(Auth::user()->admin())
                                            <th>Acción</th>
                                            @endif()
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($corrales->animals as $animales)
                                                <tr>
                                                    <td><a href="{{ route('admin.animales.perfil', $animales->id) }}"><span class="badge">{{$animales->DIIO}}</span></a></td>
                                                    <td>{{$animales->tipo}}</td>
                                                    <td>
                                                        @if($animales->estado == "Vivo")
                                                            <span class="label label-success">{{$animales->estado}}</span>
                                                        @else
                                                            @if($animales->estado == "Muerto")
                                                                <span class="label label-danger">{{$animales->estado}}</span>
                                                            @else
                                                                <span class="label label-warning">{{$animales->estado}}</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$animales->pesaje_actual}} KG
                                                    </td>
                                                    <td>{{$animales->created_at->format('m/Y')}}</td>
                                                    @if(Auth::user()->admin())
                                                    <td>
                                                        <a href="{{ route('admin.animales.edit', $animales->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                                        <a href="{{ route('admin.animales.destroy', $animales->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
@endsection
            @section('chartjs')
                <script>
                    //-------------
                    //- PIE CHART -
                    //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                    var pieChart = new Chart(pieChartCanvas);
                    var PieData = [
                        {
                            value: {!! $muertos !!},
                            color: "#f56954",
                            highlight: "#f56954",
                            label: "Animales Muertos"
                        },
                        {
                            value: {!! $vivos !!},
                            color: "#00a65a",
                            highlight: "#00a65a",
                            label: "Animales Vivos"
                        },
                        {
                            value: {!! $enfermos !!},
                            color: "#f39c12",
                            highlight: "#f39c12",
                            label: "Animales Enfermos"
                        }
                    ];
                    var pieOptions = {
                        //Boolean - Whether we should show a stroke on each segment
                        segmentShowStroke: true,
                        //String - The colour of each segment stroke
                        segmentStrokeColor: "#fff",
                        //Number - The width of each segment stroke
                        segmentStrokeWidth: 2,
                        //Number - The percentage of the chart that we cut out of the middle
                        percentageInnerCutout: 50, // This is 0 for Pie charts
                        //Number - Amount of animation steps
                        animationSteps: 100,
                        //String - Animation easing effect
                        animationEasing: "easeOutBounce",
                        //Boolean - Whether we animate the rotation of the Doughnut
                        animateRotate: true,
                        //Boolean - Whether we animate scaling the Doughnut from the centre
                        animateScale: false,
                        //Boolean - whether to make the chart responsive to window resizing
                        responsive: true,
                        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio: true,
                        //String - A legend template
                    };
                    //Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    pieChart.Doughnut(PieData, pieOptions);
                </script>
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
                                    data: {!! ($evolucionpesos) !!}

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
                            labels:{!! $fechaganancia !!},
                            datasets: [
                                {
                                    label: "Pesajes",
                                    fillColor: "#00a65a",
                                    strokeColor: "rgba(60,141,188,0.8)",
                                    pointColor: "#3b8bba",
                                    pointStrokeColor: "rgba(60,141,188,1)",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(60,141,188,1)",
                                    data:{{$gananciapesos}}
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
                        $('#animal').DataTable({
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
                            }
                        });
                    });
                </script>
@endsection