<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Animales</title>
</head>
<body>
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
</body>
</html>