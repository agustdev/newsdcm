<ul class="side-nav">
    <li class="side-nav-title side-nav-item">Actividad</li>
    <li class="side-nav-item">
        <a href="{{ route('embarcaciones.index') }}" class="side-nav-link">
            <i class="mdi mdi-ship-wheel"></i>
            <span>Mis Embarcaciones</span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('movimientos.despachos.index') }}" class="side-nav-link">
            <i class="uil-ship"></i>
            <span>Despacho</span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/" class="side-nav-link">
            <i class="uil-truck-case"></i>
            <span>Conduce</span>
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
