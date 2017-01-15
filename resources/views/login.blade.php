<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laravel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset("/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link  href="{{asset("fonts/font-awesome.min.css")}}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{asset("fonts/ionicons.min.css")}}" rel="stylesheet" >
    <!-- Theme style -->
    <link href="{{asset("dist/css/AdminLTE.min.css")}}" rel="stylesheet" >
    <!-- iCheck -->
    <link href="{{asset("plugins/iCheck/square/blue.css")}}" rel="stylesheet" >
    <!--Parsley -->
    <link href="{{ asset("/plugins/Parsley.js/parsley.css") }}" rel="stylesheet" />


</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Ancali</b>Beef</a>
    </div><!-- /.login-logo -->

    <div class="login-box-body">
        <p class="login-box-msg"><strong>Ingrese al sistema</strong></p>
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                {!! session('flash_notification.message') !!}
            </div>
        @endif



        {!! Form::open(['route'=> 'log.store', 'method' => 'POST','data-parsley-validate' =>'', 'id' => 'login']) !!}
            <div class="form-group">
                {!! Form::label('email' ,'Correo Electronico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@email.com','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password' ,'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '******************','required' ]) !!}
            </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Recordarme
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="form-group col-xs-4">
                {!! Form::submit('Ingresar' ,['class' => 'btn btn-primary']) !!}
            </div>
            <!-- /.col -->
        </div>

        {!! Form::close() !!}




    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="{{ asset ("/plugins/Parsley.js/parsley.min.js") }}"></script>
<script src="{{ asset ("/plugins/Parsley.js/es.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<script src="{{asset("plugins/iCheck/icheck.min.js")}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    $('#login').parsley();

</script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
</body>
</html>
