@extends('template')
@section('chart')
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Información <b>General</b></h1>
        </div>
        <div class="panel-body">
            <div class="row tile_count">
                    <div class="animated flipInX col-lg-3 col-xs-6 tile_stats_count">
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{$cantidad}}</h3>
                                    <p>Animales Registrados</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-paw"></i>
                                </div>
                                <a href="{{ route('admin.animales.index') }}" class="small-box-footer">
                                    Listado de Animales <i class="fa fa-arrow-circle-right"></i>
                                </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-3 col-xs-6 tile_stats_count">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ round($promedio) }}<sup style="font-size: 20px">KG</sup></h3>
                                <p>Pesaje Promedio</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-speedometer"></i>
                            </div>
                            <a href="{{ route('admin.pesos.index') }}" class="small-box-footer">
                                Listado de Pesajes <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-3 col-xs-6 tile_stats_count">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$minimo or 0}}</h3>
                                <p>Pesaje Minimo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-down-right"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-3 col-xs-6 tile_stats_count">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{$maximo or 0}}</h3>
                                <p>Pesaje Maximo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-up-right"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="box box-primary animated pulse slow go">
                        <div class="box-header with-border">
                            <h3 class="box-title">Evolución por Galpones</h3>
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

                    <!-- DONUT CHART -->
                    <div class="box box-danger animated pulse slow go">
                        <div class="box-header with-border">
                            <h3 class="box-title">Estado de los Animales</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="chart-responsive">
                                        <canvas id="pieChart" style="height:250px"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="chart-legend clearfix pull-left">
                                        <li><i class="fa fa-circle-o text-green"></i> Vivos</li>
                                        <li><i class="fa fa-circle-o text-yellow"></i> Enfermos</li>
                                        <li><i class="fa fa-circle-o text-red"></i> Muertos</li>

                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"><span class="pull-right text-red"><i class="fa fa-angle"></i></span></a></li>
                                <li><a href="#"><span class="pull-right text-green"><i class="fa fa-angle"></i></span></a></li>
                                <li><a href="#"><span class="pull-right text-yellow"><i class="fa fa-angle"></i></span></a></li>
                            </ul>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info animated pulse slow go">
                        <div class="box-header with-border">
                            <h3 class="box-title">Line Chart</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <!-- BAR CHART -->
                    <div class="box box-success animated pulse slow go">
                        <div class="box-header with-border">
                            <h3 class="box-title">Rendimiento Mensual</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="barChart" style="height:264px"></canvas>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col (RIGHT) -->
            </div><!-- /.row -->
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
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Galpón 1",
                        fillColor: "#00c0ef",
                        strokeColor: "#00c0ef",
                        pointColor: "#00c0ef",
                        pointStrokeColor: "#00c0ef",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#00c0ef",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "Galpón 2",
                        fillColor: "#f56954",
                        strokeColor: "#f56954",
                        pointColor: "#f56954",
                        pointStrokeColor: "#f56954",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#f56954",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: "Galpón 3",
                        fillColor: "rgba(60,141,188,1)",
                        strokeColor: "rgba(60,141,188,1)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [32, 45, 87, 21, 10, 62, 11]
                    },
                    {
                        label: "Galpón 4",
                        fillColor: "#00a65a",
                        strokeColor: "#00a65a",
                        pointColor: "#00a65a",
                        pointStrokeColor: "#00a65a",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#00a65a",
                        data: [10, 20, 10, 16, 56, 20, 40]
                    },
                    {
                        label: "Galpón 5",
                        fillColor: "#f39c12",
                        strokeColor: "#f39c12",
                        pointColor: "#f39c12",
                        pointStrokeColor: "#f39c12",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#f39c12",
                        data: [10, 20, 10, 16, 56, 20, 40]
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
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

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

        //-------------
        //- BAR CHART -
        //-------------


        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
            labels: {!! $numerogalpones !!},
            datasets: [
                {
                    label: "Promedio actual",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! $promediogalpones !!}
                },
                {
                    label: "Promedio inicial",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: {!! $primerpromediogalpones !!}
                }


            ]
        };

        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
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

        barChartOptions.datasetFill = true;
        barChart.Bar(barChartData, barChartOptions);
      });
    </script>
   @endsection