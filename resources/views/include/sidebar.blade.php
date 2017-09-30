<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{ (Request::is('home') ? 'class=active' : '') }}><a href="{{route('home')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li {{ (Request::is('users') ? 'class=active' : '') }}> <a href="{{route('users.index')}}"><i class="icon icon-user"></i> <span>Colaboradores</span></a> </li>
        <li {{ (Request::is('vehicles') ? 'class=active' : '') }}> <a href="{{route('vehicles.index')}}"><i class="icon-truck"></i> <span>Veículos</span></a> </li>
        <li {{ (Request::is('alerts') ? 'class=active' : '') }}><a href="{{route('alerts.index')}}"><i class="icon-bell"></i> <span>Alertas</span></a></li>

        <li {{ (Request::is('registers') ? 'class=active' : '') }}> <a href="{{route('registers.index')}}"><i class="icon-bar-chart"></i> <span>Consumos</span></a>
        </li>
    </ul>
</div>
<!--sidebar-menu-->