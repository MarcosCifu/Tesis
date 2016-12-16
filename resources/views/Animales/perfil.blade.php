@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default animated pulse slow go">
                <div class="panel-heading">
                    <h1>Información del <b>Animal</b></h1>
                </div>
                <div class="panel-body">

                    <img class="profile-user-img img-responsive " src="{{ asset('images') }}/{{$animal->path}}"  style="width: 300px;">

                      <h3 class="profile-username text-center">{{$animal->DIIO}}</h3>
                    <p class="text-muted text-center">DIIO</p>

                    <ul class="list-group list-group-unbordered">
                        @foreach($animal->users as $origen)
                            <li class="list-group-item">
                                <b>Procedencia</b> <a class="pull-right">{{$origen->pivot->procedencia or "Se Desconoce"}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Número de Guía</b> <a class="pull-right">{{($origen->pivot->numero_Guia)}}</a>
                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <b>Tipo</b> <a class="pull-right">{{$animal->tipo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Estado</b> <a class="pull-right">{{$animal->estado}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Ubicación</b><br>
                            <a href="{{ route('admin.corrales.perfil', $animal->id_corral) }}" class="btn btn-success">Corral {{$animal->corral->numero}}</a>
                            <a href="{{ route('admin.galpones.perfil', $animal->corral->id_galpon) }}" class="btn btn-success">Galpón {{$animal->corral->galpon->numero}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Exportar Información</b><br>
                                <a href="{{ route('animalPDF', $animal->id) }}" class="btn btn-primary"><spam  class="glyphicon glyphicon-eye-open" aria-hidden="true"></spam>&nbsp; &nbsp;  Ver</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row tile_count">
                <div class="animated flipInX col-lg-4 col-xs-6 tile_stats_count">
                    <div class="small-box bg-blue">
                        <div class="icon">
                            <i class="ion-location"></i>
                        </div>
                        <div class="inner">
                            <h3>{{$animal->pesaje_inicial}} KG
                            </h3>
                            <p>Peso Inicial</p>
                        </div>
                        <h4 class="small-box-footer"><b>{{600-$animal->pesaje_inicial}} KG para peso ideal</b></h4>
                    </div>
                </div>
                <div class="animated flipInX col-lg-4 col-xs-6 tile_stats_count">
                    <div class="small-box bg-teal">
                        <div class="icon">
                            <i class="ion-arrow-graph-up-right"></i>
                        </div>
                        <div class="inner">
                            <h3>{{$ultimopeso - $animal->pesaje_inicial}} KG
                                </h3>
                            <p>Peso ganado</p>
                        </div>
                        <h4 class="small-box-footer"><b>{{round(($ultimopeso-$animal->pesaje_inicial)/$permanencia,2)}} KG por día</b></h4>
                    </div>
                </div>
                <div class="animated flipInX col-lg-4 col-xs-6 tile_stats_count">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>{{$permanencia}} Días</h3>
                            <p>Estadía</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-calendar"></i>
                        </div>
                        <h4 class="small-box-footer"><b>Ingreso:</b> {{$animal->created_at->format('d/m/Y')}}</h4>
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom animated pulse slow go">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resumen" role="tab" data-toggle="tab">Evolución</a></li>
                    <li role="presentation"><a href="#pesajes" role="tab" data-toggle="tab">Pesajes</a></li>
                    <li role="presentation"><a href="#historialmedico" role="tab" data-toggle="tab">Diagnosticos Medicos</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="resumen">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="box-header">
                                        <h3>Resumen <b>Evolutivo</b></h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-6">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Evolución</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="chart">
                                                        <canvas id="areaChart" style="height:250px"></canvas>
                                                    </div>
                                                </div><!-- /.box-body -->
                                        </div>
                                        <div class="col-md-6">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Distribución</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="chart">
                                                        <canvas id="barChart" style="height:250px"></canvas>
                                                    </div>
                                                </div><!-- /.box-body -->
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                        <div role="tabpanel" class="tab-pane fade" id="pesajes">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="box-header">
                                            <h3>Listado de <b>Pesajes</b></h3>
                                            @if(Auth::user()->admin())
                                            <div>
                                                <a href="{{route('admin.animales.pesoperfil', $animal->id)}}" class="btn btn-success"><spam class="glyphicon glyphicon-scale"></spam> &nbsp; &nbsp;Registar <b>Pesaje</b></a>
                                            </div>
                                            @endif()
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="pesos" class="table table-bordered table">
                                                <thead>
                                                <tr>
                                                    <th>Pesaje</th>
                                                    <th>Fecha</th>
                                                    @if(Auth::user()->admin())
                                                    <th>Acción</th>
                                                    @endif()
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($animal->pesos as $peso)
                                                    <tr>
                                                        <td>{{$peso->pesaje}}</td>
                                                        <td>{{$peso->created_at->format('m/Y')}}</td>
                                                        @if(Auth::user()->admin())
                                                        <td>
                                                            <a href="{{ route('admin.pesos.edit', $peso->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                                            <a href="{{ route('admin.pesos.destroy', $peso->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
                        <div role="tabpanel" class="tab-pane fade" id="historialmedico">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="box-header">
                                            <h3>Listado de <b>Diagnostcos Medicos</b></h3>
                                            @if(Auth::user()->admin())
                                            <div>
                                                <a href="{{route('admin.animales.historialperfil', $animal->id)}}" class="btn btn-success"><i class="fa fa-stethoscope"></i>&nbsp; &nbsp; Registar <b>Diagnostico</b></a>
                                            </div>
                                            @endif()
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="historial" class="table table-bordered table">
                                                <thead>
                                                <tr>
                                                    <th>Diagnostico</th>
                                                    <th>Fecha</th>
                                                    @if(Auth::user()->admin())
                                                    <th>Acción</th>
                                                    @endif()
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($animal->historialesmedicos as $historial)
                                                    <tr>
                                                        <td>{{$historial->enfermedad}}</td>
                                                        <td>{{$historial->created_at->format('m/Y')}}</td>
                                                        @if(Auth::user()->admin())
                                                        <td>
                                                            <a href="{{ route('admin.historiales.edit', $historial->id) }}" class="btn btn-warning"><spam  class="glyphicon glyphicon-wrench" aria-hidden="true"></spam></a>
                                                            <a href="{{ route('admin.historiales.destroy', $historial->id) }}" class="btn btn-danger"><spam onclick="return confirm('¿Seguro que deseas eliminar este pesaje?')" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></spam></a>
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
        </div><!-- /.nav-tabs-custom -->
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
                labels: {!! ($fecha) !!},
                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: {!! ($pesos) !!}

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
                responsive: true,

            };

            //Create the line chart
            areaChart.Line(areaChartData, areaChartOptions);



            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas);
            var barChartData = {
                labels: {!! $fechaganancia !!},

                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "#00a65a",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data:{{$gananciapeso}}
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
            $('#pesos').DataTable({
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
        $(function () {
            $('#historial').DataTable({
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
