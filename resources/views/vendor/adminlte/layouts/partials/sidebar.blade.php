<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/user_alexandre_128x128.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
        @endif
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"> ADMINISTRAÇÃO</li>
            <li class="treeview"><a href="{{ url('home') }}"><i class='fa fa-users'></i> <span> DASHBOARD</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-database'></i> <span> MÓDULO CADASTROS</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('mark.index') }}"><i class='fa fa-industry'></i> <span> MONTADORA</span></a></li>
                    <li><a href="{{ route('car.index') }}"><i class='fa fa-car'></i> <span> CARROS</span></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
