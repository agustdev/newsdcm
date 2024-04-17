<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>SACOM | Sistema Administrativo de Control Maritimo - CDP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema Administrativo de control Maritimo" name="description">
        <meta content="Capitania de Puertos y Autoridad Maritima" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/capitania_web2_sm.png') }}">
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
        <style>
            nav {
                height: 75px;
                padding: 5px;
                position: absolute;
                width: 100%;
                background: white;
            }

            .hero {
                width: 100%;
                height: 100vh;
                background: url({{ asset('images/hero1.jpg') }});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .layer {
                width: 100%;
                height: 100vh;
                background: rgba(17, 34, 122, 0.50);
                display: grid;
                justify-content: center;
                align-items: center;
            }

            .buttons {
                display: flex;
                justify-content: center;
                flex-direction: row;
                gap: 20px;
            }

            footer {
                position: fixed;
                text-align: center;
                bottom: 0;
                width: 100%;
                height: 50px;
                background: white;
                color: #01136E;
                display: flex;
                justify-content: center;
                align-items: center;
            }



            @media only screen and (max-width: 600px) {
                h1 {
                    font-size: 20px !important;
                }
            }
        </style>

    </head>

    <body>
        <nav>
            <div style="height: 100%; display: flex; justify-content: center; ">
                <img src="{{ asset('assets/images/capitania_web3.png') }}" />
            </div>
        </nav>
        {{-- <header class="bg-white h-30">
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/capitania_web3.png') }}" alt="logo-cdp">
            </div>
        </header> --}}
        <div class="hero">
            <div class="layer">
                <class="container">
                <h1 class="h1" style="font-weight: bold; color: white; text-align: center;">
                    <span style="color: #FAFF00;">BIENVENIDOS</span>
                    <br />
                    ARMADA DE LA REPÚBLICA DOMINICANA <br /> SISTEMA ADMINISTRATIVO DE CONDUCE Y DESPACHO DE
                    EMBARCACIONES
                </h1>
                <!-- <h6 style="color: white; text-align: center;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu gravida magna. Duis condimentum et nibh nec scelerisque. Nulla eros lacus, luctus auctor viverra nec, faucibus et sem.
                    </h6> -->
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <h3 style="color: #FAFF00; font-weight: bold; text-align: center;">ENTRADAS Y SALIDAS INTERNACIONALES
                </h3>
                <h3 style="color: white; text-align: center; text-decoration: underline;">
                    <span>
                        <a style="color: white;" href="{{ route('register') }}">E-Ticket Marítimo</a>
                    </span>
                </h3>
                <br />
                <br />
                <br />
                <div class="buttons">
                    @auth
                        <a href="{{ route('redireccion') }}" class="nav-link d-lg-none">SACOM</a>
                        <a href="{{ route('redireccion') }}"
                            class="btn btn-sm btn-warning btn-rounded d-none d-lg-inline-flex">
                            <i class="mdi mdi-ship-wheel me-2"></i> SACOM
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link d-lg-none">INICIAR SESIÓN</a>
                        <a href="{{ route('login') }}" class="btn btn-light">
                            INICIAR SESIÓN
                        </a>
                        @if (Route::has('register'))
                            {{-- <button style="color: blue; " type="button" class="btn btn-light">INICIAR SESIÓN</button> --}}

                            {{-- <a href="{{ route('register') }}" class="nav-link d-lg-none">REGISTRARSE</a> --}}
                            <a href="{{ route('register') }}" class="btn btn-danger">
                                REGISTRARSE
                            </a>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
        </div>
        <!-- START FOOTER -->
        <footer>
            © 2024 SACOM - Comando Naval de Capitanias de Puerto y Autoridad Maritima (CDP)
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>

</html>
