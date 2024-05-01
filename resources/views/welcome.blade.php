<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>SACOM | {{ __('Sistema Administrativo de Control Maritimo') }} - CDP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema Administrativo de control Maritimo" name="description">
        <meta content="Capitania de Puertos y Autoridad Maritima" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/capitania_web2_sm.png') }}">
        <!-- App css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

        <style>
            nav {
                height: 75px;
                padding: 5px;
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



            div.lang {
                box-sizing: border-box;
                display: flex;
                justify-content: end;
                margin: -60px 15px 0px 0px;
                place-content: normal end;
            }

            /* este css sobre el selector no esta activo actualmente por que el elemento en el html esta comentado */
            /* .selector {
  display: flex;
  justify-content: end;
  margin-right: 15px;
  margin-top: -50px;
} */


            @media only screen and (max-width: 600px) {
                h1 {
                    font-size: 20px !important;
                }

                .buttons {
                    flex-direction: column;
                }
            }


            @media screen and (min-width: 629px) {
                .welcome {
                    font-size: 60px;
                }

                .sub-title {
                    font-size: 30px;
                }
            }

            @media screen and (min-width: 441px) {
                .welcome {
                    font-size: 50px;
                }

                .sub-title {
                    font-size: 25px;
                }
            }

            @media screen and (max-width: 700px) {
                .lang {
                    display: flex;
                    justify-content: end;
                    margin-right: 15px;
                    margin-top: 15px;
                }
            }

            @media screen and (max-width: 700px) {
                .selector {
                    display: flex;
                    justify-content: end;
                    margin-right: 15px;
                    margin-top: 15px;
                }
            }

            @media screen and (max-width: 743px) {
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
                <div style="height: 100%; display: flex; justify-content: center; ">
                    <img src="{{ asset('images/logo1.png') }}" />
                </div>
                <div class="lang">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <form action="{{ route('lang.switch') }}" method="POST">
                                @csrf
                                <select onchange="this.form.submit()" name="language" id="language"
                                    class="form-select mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 mb-6 changeLang">
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
                        <div style="color: #FAFF00;" class="bienvenido mb-3">{{ __('BIENVENIDOS') }}</div>
                        {{-- <br /> --}}
                        {{ __('ARMADA DE REPÚBLICA DOMINICANA') }} <br />
                        {{ __('SISTEMA ADMINISTRATIVO DE CONDUCE Y DESPACHO DE EMBARCACIONES') }}
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
                    <h3 style="color: #FAFF00; font-weight: bold; text-align: center;" class="entrada">
                        {{ __('ENTRADAS Y SALIDAS INTERNACIONALES') }}
                    </h3>
                    <h3 style="color: white; text-align: center; text-decoration: underline;" class="mt-3">
                        <span>
                            <a style="color: white;" href="{{ route('register') }}">{{ __('E-Ticket Marítimo') }}</a>
                        </span>
                    </h3>

                    <br />
                    <div class="buttons">
                        @auth
                            <a href="{{ route('redireccion') }}" class="nav-link d-lg-none">SACOM</a>
                            <a href="{{ route('redireccion') }}" class="btn btn-warning d-none d-lg-inline-flex">
                                <i class="mdi mdi-ship-wheel mdi-18px me-2"></i> SACOM
                            </a>
                        @else
                            {{-- <a href="{{ route('login') }}" class="nav-link d-lg-none">INICIAR SESIÓN</a> --}}
                            @if (Route::has('register'))
                                {{-- <button style="color: blue; " type="button" class="btn btn-light">INICIAR SESIÓN</button> --}}

                                {{-- <a href="{{ route('register') }}" class="nav-link d-lg-none">REGISTRARSE</a> --}}
                                <a href="{{ route('login') }}" class="btn btn-light">
                                    {{ __('INICIAR SESIÓN') }}
                                </a>
                                <a style="background-color: #dc2626; color: white;" href="{{ route('register') }}"
                                    class="btn btn-danger">
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
            © {{ date('Y') }} SACOM - Comando Naval de Capitanias de Puerto y Autoridad Maritima (CDP)
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>

</html>
