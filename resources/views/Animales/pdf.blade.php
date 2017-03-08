<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">

    <title>{{ $page_title or "Ancali Beef" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{asset("/bootstrap/fonts/css/font-awesome.css")}}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{asset("/bootstrap/css/ionicons.css")}}" rel="stylesheet" type="text/css" />
    <!-- Animate -->
    <link href="{{asset("/bootstrap/css/animate.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/plugins/chosen/chosen.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/dist/css/skins/skin-yellow.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" />
    <!--Steps -->
    <link href="{{ asset("/plugins/steps/normalize.css") }}" rel="stylesheet" />
    <link href="{{ asset("/plugins/steps/jquery.steps.css") }}" rel="stylesheet" />
    <!--FullCalendar -->
    <link href="{{asset("/plugins/fullcalendar/fullcalendar.css")}}" rel="stylesheet" />
    <link href="{{asset("/plugins/fullcalendar/fullcalendar.print.css")}}" media="print" rel="stylesheet">
    <!--Parsley -->
    <link href="{{ asset("/plugins/Parsley.js/parsley.css") }}" rel="stylesheet" />





</head>
<body>
<div>
    <section class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default animated pulse slow go">
                    <div class="panel-heading">
                        <h1>Información del <b>Animal</b></h1>
                    </div>
                    <div class="panel-body">
                        @if($animal->path != "")
                            <img src="https://s3-us-west-2.amazonaws.com/ancalibeef/{{$animal->path}}"  style="width: 300px;">
                        @else
                            <img src="{{asset('images/no-photo.jpg')}}"  style="width: 300px;">

                        @endif
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                DIIO:  <b class="pull-right">{{$animal->DIIO}}</b>&nbsp;&nbsp;
                                Tipo: <b class="pull-right">{{$animal->tipo}}</b>&nbsp;&nbsp;
                            </li>
                            <li class="list-group-item">
                                Registrado desde:  <b class="pull-right">{{$animal->created_at->format('d/m/Y')}}</b>&nbsp;&nbsp;  Estadía:  <b class="pull-right">{{$permanencia}} Dias</b>
                            </li>
                            <li class="list-group-item">
                                Pesaje Inicial:  <b class="pull-right">{{$animal->pesaje_inicial}} KG</b>&nbsp;&nbsp;
                                @if( $ultimopeso > $animal->pesaje_inicial )
                                    Último pesaje:  <b class="pull-right text-green">{{$ultimopeso}} KG</b>&nbsp;&nbsp;
                                    <b class="pull-right text-green">+ {{round((($ultimopeso-$animal->pesaje_inicial)*100)/$animal->pesaje_inicial,2)}}%</b>
                                @else
                                    @if($ultimopeso < $animal->pesaje_inicial)
                                        Último pesaje:  <b class="pull-right text-red">{{$ultimopeso}} KG</b>&nbsp;&nbsp;
                                        <b class="pull-right text-red">- {{round((($ultimopeso-$animal->pesaje_inicial)*100)/$animal->pesaje_inicial,2)}}%</b>
                                    @else
                                        Último pesaje:  <b class="pull-right text-blue">{{$ultimopeso}} KG</b>&nbsp;&nbsp;
                                        <b class="pull-right text-blue">{{round((($ultimopeso-$animal->pesaje_inicial)*100)/$animal->pesaje_inicial,2)}}%</b>
                                    @endif
                                @endif
                            </li>
                            <li class="list-group-item">
                                @if( $ultimopeso > $animal->pesaje_inicial )
                                    Pesaje ganado:  <b class="pull-right text-green">{{round($ultimopeso-$animal->pesaje_inicial,2)}} KG</b>&nbsp;&nbsp;
                                    KG por día: <b class="text-green">{{round(($ultimopeso-$animal->pesaje_inicial)/$permanencia,2)}} KG</b>&nbsp;&nbsp;
                                @else
                                    @if($ultimopeso < $animal->pesaje_inicial)
                                        Pesaje ganado:  <b class="pull-right text-green">{{round($ultimopeso-$animal->pesaje_inicial,2)}} KG</b>&nbsp;&nbsp;
                                        KG por día: <b class="text-red">{{round(($ultimopeso-$animal->pesaje_inicial)/$permanencia,2)}} KG</b>&nbsp;&nbsp;
                                    @else
                                        Pesaje ganado:  <b class="pull-right text-green">{{round($ultimopeso-$animal->pesaje_inicial,2)}} KG</b>&nbsp;&nbsp;
                                        KG por día: <b class="text-blue">{{round(($ultimopeso-$animal->pesaje_inicial)/$permanencia,2)}} KG</b>&nbsp;&nbsp;
                                    @endif
                                @endif

                            </li>
                            <li class="list-group-item">
                                Estado: <b class="pull-right">{{$animal->estado}}&nbsp;&nbsp;</b>Último Diagnostico: <b class="pull-right">{{$ultimodiagnostico->enfermedad or 'Ninguno'}}</b>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset ("/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Parsley -->
<script src="{{ asset ("/plugins/Parsley.js/parsley.min.js") }}"></script>
<script src="{{ asset ("/plugins/Parsley.js/es.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset ("/bootstrap/js/bootstrap-confirmation.js") }}"></script>
<script src="{{ asset ("/bootstrap/js/bootstrap-confirmation.min.js") }}"></script>

<script src="{{asset("/plugins/fullcalendar/moment.js")}}"></script>
<script src="{{asset("/plugins/fullcalendar/fullcalendar.min.js")}}"></script>
<script src="{{asset("/plugins/fullcalendar/es.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/dist/js/app.js") }}"></script>

<script src="{{asset("plugins/jquery-ui-1.12.1/jquery-ui.min.js")}}"></script>

<script src="{{ asset ("/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>

<script src="{{ asset ("/plugins/fastclick/fastclick.min.js") }}"></script>

<script src="{{ asset("/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>

<script src="{{ asset ("/plugins/chartjs/Chart.js") }}"></script>
<script src="{{ asset ("/plugins/chosen/chosen.jquery.js") }}"></script>


</body>
</html>