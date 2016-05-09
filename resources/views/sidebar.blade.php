<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-gears"></i> Panel de Control</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
            <li>
                <a href="#">
                    <i class="fa fa-paw"></i><span>Animales</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.animales.index')}}"><i class="fa  fa-table"></i>Listado de Animales</a></li>
                    <li class="active"><a href="{{ route('admin.historiales.index')}}"><i class="fa fa-stethoscope"></i>Historiales Medicos</a></li>
                    <li class="active"><a href="{{ route('admin.pesos.index')}}"><i class="fa fa-tachometer"></i> Pesos</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-map-marker"></i><span>Ubicaciones</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.galpones.index')}}"><i class="fa fa-map-signs"></i>Galpones</a></li>
                    <li class="active"><a href="{{ route('admin.corrales.index')}}"><i class="fa fa-tags"></i>Corrales</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.materiales.index')}}"><i class="fa fa-home"></i> <span>Bodega</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>