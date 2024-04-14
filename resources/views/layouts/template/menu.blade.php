<ul class="side-nav">
    <li class="side-nav-title side-nav-item">Actividad</li>
    <li class="side-nav-item {{ request()->is('quick-access*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('acceso.rapido') }}"
            class="side-nav-link {{ request()->is('quick-access*') ? 'menuitem-active' : '' }}">
            <i class="mdi mdi-ship-wheel"></i>
            <span>Acceso rápido</span>
        </a>
    </li>
    <li class="side-nav-item">
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
    </li>
    <li class="side-nav-item {{ request()->is('entradas*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.entradas.index') }}"
            class="side-nav-link {{ request()->is('entradas*') ? 'menuitem-active' : '' }}">
            <i class="uil-ship"></i>
            <span>Entradas Internacionales</span>
        </a>
    </li>
    <li class="side-nav-item {{ request()->is('salidas*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.salidas.index') }}"
            class="side-nav-link {{ request()->is('salidas*') ? 'menuitem-active' : '' }}">
            <i class="uil-ship"></i>
            <span>Salidas Internacionales</span>
        </a>
    </li>
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
