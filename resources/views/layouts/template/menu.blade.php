<ul class="side-nav">
    <li class="side-nav-title side-nav-item">{{ __('Actividad') }}</li>
    <li class="side-nav-item {{ request()->is('quick-access*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('acceso.rapido') }}"
            class="side-nav-link {{ request()->is('quick-access*') ? 'menuitem-active' : '' }}">
            <i class="mdi mdi-ship-wheel"></i>
            <span>{{ __('Acceso rápido') }}</span>

        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('embarcaciones.index') }}" class="side-nav-link">
            <i class="mdi mdi-ship-wheel"></i>
            <span>
                {{ __('Mis Embarcaciones') }}
            </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('capitanes.registrados.index') }}" class="side-nav-link">
            <i class="mdi mdi-anchor"></i>
            <span>
                {{ __('Mis Capitanes') }}
            </span>
        </a>
    </li>

    <li class="side-nav-item {{ request()->is('despachos*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.despachos.index') }}"
            class="side-nav-link {{ request()->is('despachos*') ? 'active' : '' }}">
            <i class="uil-ship"></i>
            <span>{{ __('Despacho') }}</span>
        </a>
    </li>
    <li class="side-nav-item {{ request()->is('conduces*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.conduces.index') }}"
            class="side-nav-link {{ request()->is('conduces*') ? 'menuitem-active' : '' }}">
            <i class="uil-truck-case"></i>
            <span>{{ __('Conduce') }}</span>
        </a>
    </li>
    <li class="side-nav-item {{ request()->is('entradas*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.entradas.index') }}"
            class="side-nav-link {{ request()->is('entradas*') ? 'menuitem-active' : '' }}">
            <i class="uil-ship"></i>
            <span>{{ __('Entradas Internacionales') }}</span>
        </a>
    </li>
    <li class="side-nav-item {{ request()->is('salidas*') ? 'menuitem-active' : '' }}">
        <a href="{{ route('movimientos.salidas.index') }}"
            class="side-nav-link {{ request()->is('salidas*') ? 'menuitem-active' : '' }}">
            <i class="uil-ship"></i>
            <span>{{ __('Salidas Internacionales') }}</span>
        </a>
    </li>


    <li class="side-nav-item">
        <a href="{{ route('logout') }}" class="side-nav-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="uil-exit"></i>
            <span>{{ __('Cerrar Sesión') }}</span>
        </a>
    </li>
</ul>
