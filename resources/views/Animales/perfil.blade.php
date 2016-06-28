@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary animated pulse slow go">
                <div class="box-header">
                    <h3>Información del <b>Animal</b></h3>
                </div>
                <div class="box-body box-profile">

                    <td><img class="profile-user-img img-responsive " src="{{ asset('images') }}/{{$animal->path}}"  style="width: 300px;"></td>

                      <h3 class="profile-username text-center">{{$animal->DIIO}}</h3>
                    <p class="text-muted text-center">DIIO</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Fecha de ingreso</b> <a class="pull-right">{{$animal->created_at->format('d/m/Y')}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Número de Guía</b> <a class="pull-right">{{$animal->numero_Guia}}</a>
                        </li>
                        @foreach($animal->users as $origen)
                        <li class="list-group-item">

                            <b>Procedencia</b> <a class="pull-right">{{$origen->pivot->procedencia}}</a>

                        </li>
                        @endforeach
                        <li class="list-group-item">
                            <b>Tipo</b> <a class="pull-right">{{$animal->tipo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Estado</b> <a class="pull-right">{{$animal->estado}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Acción</b>
                            <td>
                                <a href="{{ route('admin.animales.pesoperfil', $animal->id) }}" class="btn btn-info pull-right"><spam  class="glyphicon glyphicon-scale" aria-hidden="true"></spam></a>
                                <a href="{{ route('admin.animales.historialperfil', $animal->id) }}" class="btn btn-danger pull-right"><spam  class="fa fa-stethoscope" aria-hidden="true"></spam></a>
                            </td>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
                    <!-- LINE CHART -->
            <div class="box box-primary animated pulse slow go">
                <div class="box-header with-border">
                    <h3 class="box-title">Evolución</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

                    <!-- BAR CHART -->
            <div class="box box-success animated pulse slow go">
                <div class="box-header with-border">
                    <h3 class="box-title">Beneficios</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (RIGHT) -->
    </div><!-- /.nav-tabs-custom -->

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
                labels: {!! $fecha !!},

                datasets: [
                    {
                        label: "Pesajes",
                        fillColor: "#00a65a",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: {!!  ($pesos) !!}
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