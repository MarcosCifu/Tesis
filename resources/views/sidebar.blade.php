<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Secciones</li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href="{{ route('admin.users.index')}}"><span>Usuarios</span></a></li>
            <li><a href="{{ route('admin.galpones.index')}}"><span>Galpones</span></a></li>
            <li><a href="{{ route('admin.corrales.index')}}"><span>Corrales</span></a></li>
            <li class="treeview">
                <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>