@extends('template')
@section('chart')
    <div class="panel panel-default animated pulse slow go">
        <div class="panel-heading">
            <h1>Información <b>General</b></h1>
        </div>
        <div class="panel-body">
            <div class="row tile_count">
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{$cantidad}}</h3>
                                    <p>Animales <br>Registrados</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-paw"></i>
                                </div>
                                <a href="{{ route('admin.animales.index') }}" class="small-box-footer">
                                    Listado de Animales <i class="fa fa-arrow-circle-right"></i>
                                </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h3>{{$aptos->count()}}</h3>
                                <p>Aptos para<br>Venta</p>
                            </div>
                            <div class="icon">
                                <i class="fa  fa-gavel"></i>
                            </div>
                            <a href="{{ route('admin.ventas') }}" class="small-box-footer">
                                Listado de Animales <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>{{$vendidos}}</h3>
                                <p>Animales <br>Vendidos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-exchange"></i>
                            </div>
                            <a href="{{ route('admin.vendidos') }}" class="small-box-footer">
                                Listado de Animales <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ round($promedio) }}<sup style="font-size: 20px">KG</sup></h3>
                                <p>Pesaje<br> Promedio</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-speedometer"></i>
                            </div>
                            <a href="{{ route('admin.ultimospesos') }}" class="small-box-footer">
                                Listado de Pesajes <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{$minimo->pesaje_actual or 0}} <sup style="font-size: 20px">KG</sup></h3>
                                <p>Pesaje<br>Minimo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-down-right"></i>
                            </div>
                            @if($minimo != null)
                            <a href="{{ route('admin.animales.perfil', $minimo->id) }}" class="small-box-footer">
                                Ver Animal <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="animated flipInX col-lg-2 col-xs-4 tile_stats_count">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$maximo->pesaje_actual or 0}}<sup style="font-size: 20px">KG</sup></h3>
                                <p>Pesaje<br>Maximo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-up-right"></i>
                            </div>
                            @if($minimo != null)
                            <a href="{{ route('admin.animales.perfil', $maximo->id) }}" class="small-box-footer">
                                Ver Animal <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                <!-- Widget Clima
                <div class="animated flipInX col-lg-2 col-xs-3 tile_stats_count">
                    <a href="//hotelmix.es/weather/los-angeles-36184"><img src="//w.bookcdn.com/weather/picture/32_36184_1_4_95a5a6_250_7f8c8d_ffffff_ffffff_1_2071c9_ffffff_0_3.png?scode=2&domid=582" /></a>
                </div>-->
            </div>
            <div class="row">
                <div class="col-md-6">
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

                        <!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                @if($enfermos > 0)
                                <li>
                                    <a href="{{route('admin.corrales.perfil',$corralenfermos->id)}}">Corral con mas <span class="label label-warning">Enfermos : </span> <span class="badge">Corral {{$corralenfermos->numero}}</span>
                                        <span class="pull-right text-yellow"> {{round(($maxenfermos/$enfermos)*100,1)}} %</span>
                                    </a>
                                </li>
                                @endif
                                @if($muertos > 0)
                                    <li>
                                        <a href="{{route('admin.corrales.perfil',$corralmuertos->id)}}">Corral con mas <span class="label label-danger">Muertos : </span> <span class="badge">Corral {{$corralmuertos->numero}}</span>
                                            <span class="pull-right text-red"> {{round(($maxmuertos/$muertos)*100,1)}} %</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- /.footer -->
                    </div><!-- /.box -->
                    <!-- AREA CHART -->
                </div><!-- /.col (LEFT) -->

                <div class="col-md-6">
                    <!-- BAR CHART -->
                    <div class="box box-success animated pulse slow go">
                        <div class="box-header with-border">
                            <h3 class="box-title">Promedio de pesajes por Galpón</h3>
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

                    <!-- LINE CHART -->


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
                    label: "Promedio inicial",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: {!! $primerpromediogalpones !!}
                },
                {
                    label: "Promedio actual",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! $promediogalpones !!}
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