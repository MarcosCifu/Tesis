
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-gears"></i> Panel de Control</li>
            <li class="active treeview"><a href="{{ route('index')}}"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
            <li><a href="{{ route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-paw"></i><span>Animales</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.animales.index')}}"><i class="fa  fa-table"></i>Listado de Animales</a></li>
                    <li><a href="{{ route('admin.historiales.index')}}"><i class="fa fa-stethoscope"></i>Historiales Medicos</a></li>
                    <li><a href="{{ route('admin.pesos.index')}}"><i class="glyphicon glyphicon-scale"></i> Pesos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-marker"></i><span>Ubicaciones</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.galpones.index')}}"><i class="fa fa-building"></i>Galpones</a></li>
                    <li class="active"><a href="{{ route('admin.corrales.index')}}"><i class="fa fa-tags"></i>Corrales</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.materiales.index')}}"><i class="fa fa-home"></i> <span>Bodega</span></a></li>
        </ul>
    </section>
</aside>