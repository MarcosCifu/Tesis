<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Ancali Beef" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ asset("/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/dist/css/skins/skin-yellow.min.css")}}" rel="stylesheet" type="text/css" />



    <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

            <!-- Header -->
    @include('header')
            <!-- Sidebar -->
    @include('sidebar')
            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>
                @yield('title')
                <small>{{ $page_description or null }}</small>
            </h1>

            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">@yield('title')</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="panel-body">
            <!-- Your Page Content Here -->




            @include('flash::message')
            @yield('content')



        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('footer')

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

<script src="{{ asset ("/plugins/chartjs/Chart.js") }}"></script>

<script src="{{ asset ("/plugins/chartjs/Chart.min.js") }}"></script>
</body>
</html>