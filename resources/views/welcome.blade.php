<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>SISCODEM | {{ __('Sistema de Conduce y Despacho de Embarcaciones') }}, ARD.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de Conduce y Despacho de Embarcaciones" name="description">
        <meta content="Comando Naval de Capitania de Puertos y Autoridad Maritima, ARD." name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/capitania_web2_sm.png') }}">
        <!-- App css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
        {{-- estilos del landing --}}
        <style>
            body {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            nav {
                height: 75px;
                position: absolute;
                width: 100%;
                background: linear-gradient(90deg, rgb(6, 5, 84) 0%, rgb(13, 47, 144) 80%);
            }

            .hero {
                width: 100%;
                height: 100vh;
                background: url("./images/hero1.jpg");
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
                margin: 0 10px;
                gap: 20px;
            }

            .button-primary-ard {
                width: 244px;
                height: 50px;
                border: 1px solid #01136E;
                color: #01136E;
                background: white;
                border-radius: 8px;
                font-weight: bold;
                font-size: 16px;
            }

            .button-secondary-ard {
                width: 244px;
                height: 50px;
                color: white;
                background: #FF0000;
                border-radius: 8px;
                font-weight: bold;
                font-size: 16px;
                border: none;
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

            .lang {
                display: flex;
                justify-content: end;
                margin-right: 15px;
                margin-top: -50px;
            }

            .welcome {
                font-size: 60px;
            }

            @media only screen and (max-width: 600px) {
                h1 {
                    font-size: 25px !important;
                    /* cosas que si no funciona puedo borrar esto */
                    /* esto lo estoy utilizando para mover el h1 un poco mas arriba */
                    margin-top: -80px !important;
                    /* en caso de que se dañe algo*/
                }

                .sub-title {
                    margin-top: 100px;
                    margin-bottom: 0px;
                }

                .buttons {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    width: 100%;
                }

                .buttons button,
                .buttons a {
                    width: 244px !important;
                }
            }

            @media only screen and (max-height: 1100px) {
                h1 {
                    font-size: 20px !important;
                    margin-top: 100px !important;
                }

                /* en caso recordar que puedo borrar por aqui */


                .buttons {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    width: 100%;

                }

                .buttons button,
                .buttons a {
                    width: 244px !important;
                }
            }

            @media screen and (min-width: 629px) {
                .welcome {
                    font-size: 55px;
                }

                .sub-title {
                    font-size: 20px;
                }
            }

            @media screen and (max-width: 380px) {
                .welcome {
                    font-size: 40px;
                }
            }

            @media screen and (max-width: 700px) {
                .lang {
                    display: flex;
                    justify-content: end;
                    margin-right: 15px;
                    margin-top: 15px;
                }

                .selector {
                    display: flex;
                    justify-content: end;
                    margin-right: 15px;
                    margin-top: 15px;
                }
            }

            @media screen and (max-width: 741px) {
                .hero {
                    background: url(images/mobilecarroybarco.jpg);
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            }
        </style>

    </head>

    <body>
        <header>
            <nav>
                <div style="height: 100%; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('images/logo1.png') }}" style="max-width: 350px; height: auto;" />
                </div>
                <div class="lang">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <form action="{{ route('lang.switch') }}" method="POST">
                                @csrf
                                <select onchange="this.form.submit()" name="language" id="language"
                                    class="form-select block w-full pt-1 pb-1 mb-6 changeLang">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        <option value="{{ $language['flag'] }}"
                                            {{ app()->getLocale() === $language['flag'] ? 'selected' : '' }}
                                            data-img="{{ asset('images/' . $language['image']) }}">
                                            {{ $language['display'] }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        {{-- <header class="bg-white h-30">
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/capitania_web3.png') }}" alt="logo-cdp">
            </div>
        </header> --}}
        <div class="hero">
            <div class="layer">
                <div class="container">
                    <h1 class="h1" style="font-weight: bold; color: white; text-align: center;">
                        <div style="color: #FAFF00;" class="welcome">{{ __('BIENVENIDOS') }}</div>
                        {{-- <br /> --}}
                        {{ __('ARMADA DE REPÚBLICA DOMINICANA') }} <br />
                        {{ __('SISTEMA DE CONDUCE Y DESPACHO DE EMBARCACIONES') }}
                        <br>
                        (SISCODEM)
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
                    <div>
                        <h3 style="color: #FAFF00; font-weight: bold; text-align: center;" class="entrada">
                            {{ __('ENTRADAS Y SALIDAS INTERNACIONALES') }}
                        </h3>
                        <h3 style="color: white; text-align: center; text-decoration: underline;" class="mt-3">
                            <span>
                                <a style="color: white;"
                                    href="{{ route('register') }}">{{ __('E-Ticket Marítimo') }}</a>
                            </span>
                        </h3>
                    </div>

                    <br />
                    <div class="buttons">
                        @auth
                            {{-- <a href="{{ route('redireccion') }}" class="nav-link d-lg-none">SISCODEM</a> --}}
                            <a href="{{ route('redireccion') }}" class="btn button-primary-ard">
                                {{-- <i class="mdi mdi-ship-wheel mdi-18px me-2"></i>  --}}
                                ENTRAR AL SISTEMA
                            </a>
                        @else
                            {{-- <a href="{{ route('login') }}" class="nav-link d-lg-none">INICIAR SESIÓN</a> --}}
                            @if (Route::has('register'))
                                {{-- <button style="color: blue; " type="button" class="btn btn-light">INICIAR SESIÓN</button> --}}

                                {{-- <a href="{{ route('register') }}" class="nav-link d-lg-none">REGISTRARSE</a> --}}
                                <a href="{{ route('login') }}" class="btn button-primary-ard">
                                    {{ __('INICIAR SESIÓN') }}
                                </a>
                                <a href="{{ route('register') }}" class="btn button-secondary-ard">
                                    {{ __('REGISTRARSE') }}
                                </a>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>
        </div>
        <!-- START FOOTER -->
        <footer>
            © {{ date('Y') }} - Comando Naval de Capitanias de Puerto y Autoridad Maritima, ARD.
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>
