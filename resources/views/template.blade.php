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
    <link href="{{ asset("/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/dist/css/skins/skin-yellow.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("/bootstrap/js/custom.js")}}" rel="stylesheet"/>
    <link href="{{ asset("/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" />


    <script src="{{asset("/bootstrap/js/jquery.min.js")}}"></script>

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
            <!-- Header -->
    @include('header')
            <!-- Sidebar -->
    @include('sidebar')
            <!-- Content Wrapper. Contains page content -->
    <div class="right_col" role="main">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="panel-body">
                    <!-- Your Page Content Here -->
                    @include('flash::message')
                    @yield('content')
                    @yield('chart')


            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
<script src="{{ asset ("/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>

<script src="{{ asset ("/plugins/fastclick/fastclick.min.js") }}"></script>

<script src="{{ asset ("/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>

<script src="{{ asset("/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>

<script src="{{ asset ("/plugins/chartjs/Chart.js") }}"></script>

@yield('chartjs')
@yield('tablejs')
@yield('ajaxjs')


</body>
</html>