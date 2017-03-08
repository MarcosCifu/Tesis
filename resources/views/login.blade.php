@extends('Index.template')
@section('content')
    <!-- banner1 -->
    <div class="banner1">
        <div class="container">
        </div>
    </div>

    <div class="services-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('inicio')}}">Inicio</a><i>|</i></li>
                <li>Ingresar</li>
            </ul>
        </div>
    </div>
    <!-- //banner1 -->
    <!-- login -->
    <div class="login" id="#login">
        <div class="container">
            <h6>Login</h6>
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    {!! session('flash_notification.message') !!}
                </div>
            @endif
            {!! Form::open(['route'=> 'log.store', 'method' => 'POST','data-parsley-validate' =>'', 'id' => 'login']) !!}
            {!! csrf_field() !!}
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

            <div class="agile_back_home">
                <a href="{{route('inicio')}}">volver al inicio</a>
            </div>
        </div>
    </div>
    <!-- //login -->
@endsection
@section('script')
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
    @endsection

