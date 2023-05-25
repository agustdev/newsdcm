<ul class="side-nav">
    <li class="side-nav-title side-nav-item">NAVEGACIóN</li>
    <li class="side-nav-item {{ request()->is('dashboard*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('admin.dashboard') }}"
            class="side-nav-link {{ request()->is('dashboard*') ? 'menuitem-active' : '' }}">
            <i class="mdi mdi-gauge"></i>
            <span>Panel</span>
        </a>
    </li>
    <li class="side-nav-item ">
        <a href="{{ route('admin.solicitudes.history') }}" class="side-nav-link ">
            <i class="mdi mdi-gauge"></i>
            <span>Listado de Solicitudes</span>
        </a>
    </li>
    <li class="side-nav-item ">
        <a href="{{ route('admin.verificacion') }}" class="side-nav-link ">
            <i class="mdi mdi-gauge"></i>
            <span>Verificación</span>
        </a>
    </li>
    <li class="side-nav-title side-nav-item">ACTIVIDADES</li>
    <li
        class="side-nav-item {{ request()->is('admin/solicitudes*') ? 'menuitem-active' : '' }} {{ request()->is('admin/solicitud*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('admin.solicitudes.index') }}"
            class="side-nav-link {{ request()->is('admin/solicitudes*') ? 'active' : '' }}{{ request()->is('admin/solicitud*') ? 'active' : '' }}">
            <i class="uil-document-layout-center"></i>
            @if (get_all_count_solicitudes() > 0)
            <span class="badge bg-danger float-end">{{ get_all_count_solicitudes() }}</span>
            @endif
            <span>Solicitudes</span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('admin.alertas') }}" class="side-nav-link">
            <i class="uil-bell"></i>
            @if (get_all_count_alertas() > 0)
            <span class="badge bg-danger float-end">{{ get_all_count_alertas() }}</span>
            @endif
            <span>Alertas</span>
        </a>
    </li>
    <li class="side-nav-title side-nav-item">AREA ADMINISTRATIVA</li>
    <li class="side-nav-item">
        <a href="#" class="side-nav-link">
            <i class="uil-user"></i>
            <span> Usuarios </span>
        </a>
    </li>
    {{-- <li class="side-nav-item">
        <a href="{{ route('embarcaciones.index') }}" class="side-nav-link">
            <i class="mdi mdi-ship-wheel"></i>
            <span>Mis Embarcaciones</span>
        </a>
    </li>

    <li class="side-nav-item {{ request()->is('despachos*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.despachos.index') }}"
            class="side-nav-link {{ request()->is('despachos*') ? 'active' : '' }}">
            <i class="uil-ship"></i>
            <span>Despacho</span>
        </a>
    </li>
    <li class="side-nav-item {{ request()->is('conduces*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.conduces.index') }}"
            class="side-nav-link {{ request()->is('conduces*') ? 'menuitem-active' : '' }}">
            <i class="uil-truck-case"></i>
            <span>Conduce</span>
        </a>
    </li> --}}
    {{-- <li class="side-nav-title side-nav-item">Navegación</li>
    <li class="side-nav-item">
        <a href="/" class="side-nav-link">
            <i class="uil-table"></i>
            <span> Listado de Despachos </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/" class="side-nav-link">
            <i class="uil-table"></i>
            <span> Listado de Conduces </span>
        </a>
    </li> --}}
</ul>