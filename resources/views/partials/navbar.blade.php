<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('adminkit/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="@if (Auth::check())
                            <li>{{ Auth::user()->name }}</li>
                        @endif" />
                    <span class="text-dark">
                        @if (Auth::check())
                            <li>{{ Auth::user()->name }}</li>
                        @endif
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                        @csrf
                        <button class="btn btn-link text-start w-100"><i class="align-middle me-1" data-feather="log-out"></i> Cerrar sesión</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
