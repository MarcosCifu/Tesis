@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary animated pulse slow go">
                <div class="box-header">
                    <h3>Información del <b>Corral</b></h3>
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <div class="icon">
                                <i class="ion ion-ios-paw"></i>
                            </div>
                                <h2 class="text-center">Corral Número</h2>
                                <h3 class="profile-username text-center">{{$corrales->numero}}</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Fecha de creación</b> <a class="pull-right">{{$corrales->created_at->format('d/m/Y')}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cantidad de Animales</b> <a class="pull-right">{{ $corrales->cantidad_animales or 0 }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de Animales</b> <a class="pull-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Estado</b> <a class="pull-right"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 animated pulse slow go">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#resumen" data-toggle="tab">Estadisticas</a></li>
                <li><a href="#animales" data-toggle="tab">Animales</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="resumen">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3>Resumen <b>Evolutivo</b></h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-6">
                                        <div class="box">
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
                                    <div class="col-md-6">
                                        <div class="box">
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
                    </div>
                </div>
                <div class="tab-pane fade" id="animales">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3>Listado de <b>Animales</b></h3>
                                    @if(Auth::user()->admin())
                                    <div>
                                        <a href="{{route('admin.corrales.animalcorral', $corrales->id)}}" class="btn btn-success"><spam class="fa fa-paw"></spam> Registar <b>Animal</b></a>
                                    </div>
                                    @endif()
                                </div>
                                <table id="animal" class="table table-bordered table">
                                    <thead>
                                    <tr>
                                        <th>DIIO</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Ingreso</th>
                                        @if(Auth::user()->admin())
                                        <th>Acción</th>
                                        @endif()
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($corrales->animals as $animales)
                                        <tr>
                                            <td><a href="{{ route('admin.animales.perfil', $animales->id) }}">{{$animales->DIIO}}</a></td>
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
    </div>
@endsection

@section('chartjs')
    <script>
        $(function () {
            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas);

            var areaChartData = {
                labels: ,
                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data:
                    }
                ]
            };

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
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
                pointDot: false,
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
                        $('#animal').DataTable({
                            "info": false,
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