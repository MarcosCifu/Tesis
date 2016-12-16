<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-gears"></i> Panel de Control</li>
            <li class="{{ Request::is('/')? "active":""}}"><a href="{{ route('index')}}"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
            <li class="{{ Request::is('admin/animales')? 'active':''}}"><a href="{{ route('admin.animales.index')}}"><i class="fa  fa-paw"></i><span>Animales</span></a></li>
            <li class="{{ Request::is('admin/galpones')? 'active':''}}"><a href="{{ route('admin.galpones.index')}}"><i class="fa fa-building"></i><span>Galpones</span></a></li>
            <li class="{{ Request::is('admin/corrales')? 'active':''}}"><a href="{{ route('admin.corrales.index')}}"><i class="fa fa-tags"></i><span>Corrales</span></a></li>
            <li class="{{ Request::is('admin/pesos')? 'active':''}}"><a href="{{ route('admin.pesos.index')}}"><i class="glyphicon glyphicon-scale"></i><span>Pesajes</span></a></li>
            <li class="{{ Request::is('admin/historiales')? 'active':''}}"><a href="{{ route('admin.historiales.index')}}"><i class="fa fa-stethoscope"></i><span>Diagnosticos</span></a></li>
            <li class="{{ Request::is('admin/materiales')? 'active':''}}"><a href="{{ route('admin.materiales.index')}}"><i class="fa fa-home"></i> <span>Bodega</span></a></li>
            <li class="{{ Request::is('admin/precios')? 'active':''}}"><a href="{{ route('admin.precios.index')}}"><i class="fa fa-dollar "></i> <span>Precios por kilo</span></a></li>
            @if(Auth::user()->admin())
                <li class="{{ Request::is('admin/calendarios')? 'active':''}}"><a href="{{ route('admin.calendarios.index')}}"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
            @endif()
            @if(Auth::user()->admin())
            <li class="{{ Request::is('admin/users')? 'active':''}}"><a href="{{ route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
            @endif()
        </ul>
    </section>
</aside>
