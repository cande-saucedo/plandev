<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'PlanDev')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('adminkit/img/icons/icon-48x48.png') }}" />

    <!-- App CSS -->
    <link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        <div class="main">

            {{-- Contenido principal --}}
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            {{-- Footer (opcional) --}}
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted"><strong>PlanDev</strong></a> &copy; {{ date('Y') }}
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Soporte</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Ayuda</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div> {{-- .main --}}
    </div> {{-- .wrapper --}}

    <!-- App JS -->
    <script src="{{ asset('adminkit/js/app.js') }}"></script>
</body>
</html>
