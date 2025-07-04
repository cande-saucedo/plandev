<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/dashboard') }}">
            <span class="align-middle">PlanDev</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menú
            </li>

            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('proyectos*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/proyectos') }}">
                    <i class="align-middle" data-feather="folder"></i>
                    <span class="align-middle">Proyectos</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('tareas*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/tareas') }}">
                    <i class="align-middle" data-feather="check-circle"></i>
                    <span class="align-middle">Tareas</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('bitacora-diaria*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/bitacora-diaria') }}">
                    <i class="align-middle" data-feather="book-open"></i>
                    <span class="align-middle">Bitácora</span>
                </a>
            </li>

            <li class="sidebar-header">
                Usuario
            </li>

            <!--<li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Perfil</span>
                </a>
            </li>-->

            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="sidebar-link btn btn-link text-start w-100" style="padding-left: 1.5rem;">
                        <i class="align-middle" data-feather="log-out"></i>
                        <span class="align-middle">Cerrar sesión</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
