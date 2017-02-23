<!-- header -->
<div class="header">
    <div class="container">
        <div class="w3l_header_left">
            <ul>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ (56) 43 2 537800</li>
                <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="w3l_header_right">
            <ul>

                @if(Auth::user())
                    <li><a href="{{route('home.index')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Panel de Control</a></li>
                @else
                    <li><a href="{{route('log.index')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Ingresar</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"> </div>
        <script type="text/javascript" src="{{ asset('plugins/index/web/js/demo.js') }}"></script>
    </div>
</div>
<div class="logo_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <h1><a class="navbar-brand" href="{{route('inicio')}}">A<span>n</span>cali</a></h1>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="link-effect-2" id="link-effect-2">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/')? "active":''}}"><a href="{{route('inicio')}}"><span data-hover="Inicio">Inicio</span></a></li>
                        <li class="{{ Request::is('about')? "active":''}}"><a href="{{route('about')}}"><span data-hover="Empresa">Empresa</span></a></li>
                        <li class="{{ Request::is('procesos')? "active":''}}"><a href="{{route('procesos')}}"><span data-hover="Procesos">Procesos</span></a></li>
                        <li class="{{ Request::is('sustentabilidad')? "active":''}}"><a href="{{route('sustentabilidad')}}"><span data-hover="Sustentabilidad">Sustentabilidad</span></a></li>
                        <li><a href="mail.html"><span data-hover="Mail Us">Mail Us</span></a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<!-- //header -->