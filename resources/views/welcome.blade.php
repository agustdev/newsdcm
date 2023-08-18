<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>SDCM | Sistema de Control Maritimo - CDP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de control Maritimo" name="description">
    <meta content="Capitania de Puertos y Autoridad Maritima" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/capitania_web2_sm.png') }}">
    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
</head>

<body style="background-color: #0A238B !important;" class="" data-layout-config='{"darkMode":true}'>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">
            <!-- logo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
    </nav>
    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-md-12"> --}}
                    <div class="text-md-center mt-md-0 mb-3">
                        <a href="/" class="">
                            <img src="{{ asset('assets/images/capitania_web2.png') }}" alt="" height="120">
                        </a>
                    </div>
                    {{--
                </div> --}}
                <div class="col-md-12 text-md-center">
                    <h2 class="text-white fw-normal mb-4 mt-3 hero-title text-uppercase">
                        Bienvenidos al Sistema Digital de Control Marítimo, ARD<br>
                        (SDCM)
                    </h2>
                </div>
                <div class="col-md-12 mb-5">
                    <div class="text-md-center mt-3 mt-md-0">
                        <img src="assets/images/startup.svg" alt="" class="img-fluid" width="350">
                    </div>
                </div>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-0">
                        @auth
                        <a href="{{ route('redireccion') }}" class="nav-link d-lg-none">SDCM</a>
                        <a href="{{ route('redireccion') }}"
                            class="btn btn-sm btn-warning btn-rounded d-none d-lg-inline-flex">
                            <i class="mdi mdi-ship-wheel me-2"></i> SDCM
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link d-lg-none">Iniciar Sesión</a>
                        <a href="{{ route('login') }}" class="btn btn-lg btn-light btn-rounded d-none d-lg-inline-flex">
                            <i class="mdi mdi-account-key mdi-24px me-2"></i> Iniciar Sesión
                        </a>
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link d-lg-none">Registro</a>
                        <a href="{{ route('register') }}"
                            class="btn btn-lg btn-light btn-rounded d-none d-lg-inline-flex">
                            <i class="mdi mdi-account-plus mdi-24px me-2"></i> Registro
                        </a>
                        @endif
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END HERO -->
    <!-- START FOOTER -->
    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2">
                        <p class="text-muted mt-4 text-center mb-0">© {{ date('Y') }} SDCM - Comando Naval de Capitanias
                            de Puerto y Autoridad Maritima (CDP)</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>