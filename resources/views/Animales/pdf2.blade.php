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