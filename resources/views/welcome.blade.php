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
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
        {{-- estilos del landing --}}
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    </head>

    
    <body>
        <!-- navbar -->

        {{-- estoy agregnado estas clases al navbar para despues quitarlo de ser necesario border-gray-200 py-2.5 --}}
        <nav class="navbar bg-slate-100">
            {{-- navbar celular --}}
            <div class="md:hidden flex flex-col">
            <div class="simbol">
                <img src="https://ogtic.gob.do/wp-content/themes/optic/img/rd.svg"
                    alt="Escudo de la República Dominicana" class="mb-2 md:hidden h-10" />
                
            </div>
<div class="container">
            <div class="division mx-auto"></div>
        </div>
            <div class="simbol flex items-center">
                <a class="md:hidden" href="#">
                    <img src="{{ asset('images/logo armada.png') }}" alt="Logo" width="150" height="24"
                        class="inline align-top mx-1" />
                </a>

                <a class="md:hidden" href="#">
                    <img src="{{ asset('images/capitania_web.png') }}" alt="Logo" width="200" height="24"
                        class="inline align-top mx-1" />
                </a>
            </div>
        </div>
            {{-- fin del navbar celular --}}
            <div class="md:container items-center flex justify-between mx-auto py-3">
                <div class="flex items-center">
                    <!-- <img src="/img/logo-1-1.png" alt="Logo 1" class="me-2"> -->
                    
                    <a class="hidden md:block" href="#">
                        <img src="{{ asset('images/logo armada.png') }}" alt="Logo" width="250" height="24"
                            class="inline align-top" />
                    </a>

                    <a class="hidden md:block" href="#">
                        <img src="{{ asset('images/capitania_web.png') }}" alt="Logo" width="300" height="24"
                            class="inline align-top" />
                    </a>

                </div>
                <div>
                    <div class="flex items-center size">
                        <img src="{{ asset('images/rd.svg') }}" alt="Escudo de la República Dominicana"
                            class="mb-2 hidden md:block" />
                    </div>
                    <form action="{{ route('lang.switch') }}" method="POST">
                        @csrf
                        <select onchange="this.form.submit()" name="language" id="language"
                            class="form-select px-2 w-full rounded-lg border-amber-400 size hidden md:block changeLang">
                            <option value="es" selected>Seleccione su idioma</option>
                            @foreach (Config::get('languages') as $lang => $language)
                                <option value="{{ $language['flag'] }}"
                                    {{ app()->getLocale() === $language['flag'] ? 'selected' : '' }}
                                    data-img="{{ asset('images/' . $language['image']) }}">
                                    {{ $language['display'] }}</option>
                            @endforeach
                        </select>
                    </form>
                    <div class=""></div>
                </div>
            </div>
            <div class="container w-full flex justify-center">
            <form action="{{ route('lang.switch') }}" method="POST">
                @csrf
                <select onchange="this.form.submit()" name="language" id="language"
                    class="form-select rounded-lg px-3 mb-2 border-amber-400 md:hidden w-full changeLang">
                    <option value="es" selected>Seleccione su idioma</option>
                    @foreach (Config::get('languages') as $lang => $language)
                        <option value="{{ $language['flag'] }}"
                            {{ app()->getLocale() === $language['flag'] ? 'selected' : '' }}
                            data-img="{{ asset('images/' . $language['image']) }}">
                            {{ $language['display'] }}</option>
                    @endforeach
                </select>
            </form>
            
<div class="flex items-center justify-center lg:hidden">
                        <button id="menu-button" class="focus:outline-none text-slate-200">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-2xl text-slate-800 focus:outline-none active:scale-110 active:text-red-500" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
            
        </div>

        {{-- probando lo del menu del navbar --}}
        <div id="mainmenu" class="top-0 py-1 lg:py-0 w-full md:block bg-blue-900 sm:hidden lg:relative z-50">
            <nav class="z-10 sticky top-0 left-0 right-0 max-w-4xl xl:max-w-5xl mx-auto px-5 py-2.5 lg:border-none lg:py-4">
                <div class="flex items-center justify-between">
                    <div class="hidden lg:block">
                        <ul class="flex space-x-10 text-base font-bold text-white">
                            <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                <a href="#">{{ __('Inicio') }}</a>
                            </li>
                            <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                <a href="#">{{ __('Nuestros Servicios') }}</a>
                            </li>
                            <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                <a href="#">{{ __('Manual de Usuario') }}</a>
                            </li>
                            <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                                <a href="#">{{ __('Contactos') }}</a>
                            </li>
                        </ul>  
                        
                    </div>
                    <div class="hidden lg:flex lg:items-center gap-x-2">
                        <button class="flex items-center text-black dark:text-white justify-center px-6 py-2.5 font-semibold hover:underline hover:underline-offset-4 hover:w-fit">{{ __('Iniciar Sesión') }}</button>
                        <button class="flex items-center justify-center rounded-md bg-white hover:bg-gray-300 text-black px-6 py-1.5 font-semibold hover:shadow-lg hover:drop-shadow transition duration-200">{{ __('Registrarse') }}</button>
                    </div>
                    {{-- <div class="flex items-center justify-center lg:hidden">
                        <button id="menu-button" class="focus:outline-none text-slate-200">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" class="text-2xl text-slate-800 focus:outline-none active:scale-110 active:text-red-500" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div> --}}
                </div>
                <div id="mobile-menu" class="lg:hidden hidden">
                    <ul class="flex flex-col space-y-4 text-base font-bold text-white mt-4">
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Inicio') }}</a>
                        </li>
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Nuestros Servicios') }}</a>
                        </li>
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Sobre Nosotros') }}</a>
                        </li>
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Contactos') }}</a>
                        </li>
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        <li class="hover:underline hover:underline-offset-4 hover:w-fit transition-all duration-100 ease-linear">
                            <a href="#">{{ __('Registrarse') }}</a>
                        </li>
                    </ul>
                </div>
                
            </nav>
        </div>

        {{-- fin del menu del navbar --}}


        </nav>

        


        <!-- aqui empieza el contenido de la web -->
        <div class="overflow-hidden w-full">
            <div class="container-fluid">
                <div id="indicators-carousel" class="relative h-auto" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden md:h-96">
                        <!-- Item 1 -->
                        <div class="carousel-item active">
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <video autoplay muted loop
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/4 top-1/2 left-1/2 brightness-25">
                                    <source src="{{ asset('video/video.mp4') }}" type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>
                                {{-- <div class="carousel-caption mt-20">
                                    <p
                                        class="text-sm md:text-3xl font-bold animate__animated animate__backInDown animate__delay-2s">
                                        Avisos a los Navegantes
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="carousel-item active">
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.pexels.com/photos/813011/pexels-photo-813011.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/4 top-1/2 left-1/2"
                                    alt="..." />
                                <div class=" mt-8">
                                    <!-- <h1 class="text-4xl font-bold mb-1 shadow-2xl animate__animated animate__backInDown animate__delay-1s ">Bienvenidos</h1> -->
                                    {{-- <p
                                        class="text-xl md:text-3xl font-bold animate__animated animate__backInDown animate__delay-2s">
                                        Avisos a los Navegantes
                                    </p> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/costa-1.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-3/4 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/investigacion1.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://images.pexels.com/photos/8387647/pexels-photo-8387647.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <section>
            <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
                <div class="flex w-full mx-auto text-left">
                    <div class="relative inline-flex items-center mx-auto align-middle">
                        <div class="text-center">
                            <h1
                                class="max-w-5xl -mt-4 md:-mt-10 text-4xl font-bold leading-none tracking-tighter text-blue-900 md:text-5xl lg:text-4xl lg:max-w-7xl">
                                {{ __('BIENVENIDOS AL') }} <br class="lg:block" />
                                <p class="text-2xl md:text-3xl mt-3 leading-1 text-black"
                                    style="letter-spacing: 0.5px">
                                    {{ __('SISTEMA DE ARRIBO, CONDUCE Y DESPACHO DE EMBARCACIONES') }}
                                </p>
                            </h1>
                            <p class="mx-auto mt-4 text-sm leading-normal text-gray-500 justificado">
                               {{ __('El Comando Naval de Capitanías de Puertos y Autoridad Maritima, con el objetivo de eficientizar los servicios de solicitudes de Arribo, Conduce y Despacho de Embarcaciones, a decidido poner en funcionamiento esta plataforma para que todos los propietarios de embarciones y/o navieras, puedan tener acceso a esta herramienta tecnologica, para que a traves de la misma puedan formalizar sus solicitudes, acoorde a las normas establecidas por la Autoridad Maritima Nacional') }}.
                            </p>

                            <!-- botones -->
                            <div class="max-w-lg mx-auto flex flex-col justify-center items-center gap-3 sm:flex-row mt-4 md:mt-8 lg:mt-10">
                                @auth
                                    <a href="{{ route('redireccion') }}" class="btn button-primary-ard">
                                        {{-- <i class="mdi mdi-ship-wheel mdi-18px me-2"></i>  --}}
                                        {{ __('ENTRAR AL SISTEMA') }}
                                    </a>
                                @else
                                    @if (Route::has('register'))
                                        <a type="button" class="group relative inline-flex border rounded-lg border-blue-900 focus:outline-none w-full sm:w-auto"
                                            href="{{ route('login') }}">
                                            <span class="rounded-lg w-full inline-flex items-center justify-center self-stretch px-4 py-2 text-sm text-blue-900 hover:text-white text-center font-bold uppercase hover:bg-blue-500 ring-1 ring-blue-500 ring-offset-1 ring-offset-blue-500 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">

                                            {{ __('INICIAR SESIÓN') }}</span></a>
                                            
                                        <a class="group relative inline-flex border border-blue-900 rounded-lg focus:outline-none w-full sm:w-auto"
                                            href="{{ route('register') }}">
                                            <span class="rounded-lg w-full inline-flex items-center justify-center self-stretch px-4 py-2 text-sm text-white text-center font-bold uppercase bg-blue-900 ring-1 ring-blue-700 hover:bg-blue-800 ring-offset-1 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">

                                            {{ __('REGISTRARSE') }}</span></a>
                                    @endif
                                @endauth
                            </div>
                            <!-- fin de los botones -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container flex justify-center items-center w-full mt-3 mb-10 mx-auto">
                <a href="#section" class="animate__animated animate__bounce animate__infinite animate__slower"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                    </svg></a>
            </div>
        </section>

        
            

        <!-- todo esta parte esta por si acaso se usara mas adelante -->

        <!-- Aqui sera el espacio para poner las dependencias de capitania de puerto -->

        <section class="scroll-section bg-gray-50 -mt-1" id="section">
            <div class="container mx-auto hidden md:block">
                <!-- Primera parte -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Lado izquierdo -->
                    <div class="flex justify-center items-center">
                        <!-- La clase circle fue una clase que cree mediante css y es lo que me permite tener una imagen circular -->
                        <img class="rounded-full circle" src="{{ asset('images/hero1.jpg') }}"
                            alt="Imagen de un barco" />
                    </div>
                    <!-- Lado derecho -->
                    <div class="flex justify-center items-center">
                        <p class="justificado text-black md:-ml-6 md:mr-20">
                            <strong>{{ __('Conduce y Despacho de embarcaciones') }}:</strong> <br> <span class="">{{ __('Este servicio está actualmente disponible única y exclusivamente para las embarcaciones de recreo') }}.</span>
                        </p>
                    </div>
                </div>

                <!-- Segunda parte -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <!-- Lado izquierdo (visible en pantallas grandes) -->
                    <div class="hidden md:flex justify-center items-center">
                        <p class="justificado text-black md:-mr-6 md:ml-20">
                            <strong>{{ __('Buques de carga') }}:</strong> <br> <span class=""> {{ __('Con el objetivo de eficientizar y automatizar este servicio también hemos desarrollado en esta plataforma el servicio de arribo y despacho de los buques de carga, por lo que, a través de las navieras, a las cuales se les ha otorgado permiso de crear múltiples usuarios para que las mismas puedan realizar sus solicitudes en tiempo récord a las diferentes capitanías de puertos') }}. </span>
                        </p>
                    </div>
                    <!-- Lado derecho -->
                    <div class="flex justify-center items-center">
                        <!-- La clase circle fue una clase que cree mediante css y es lo que me permite tener una imagen circular -->
                        <img class="rounded-full circle" src="{{ asset('images/barcocontenedor.jpeg') }}"
                            alt="Imagen de un barco" />
                    </div>
                    <!-- Lado izquierdo (visible en pantallas pequeñas) -->
                    <div class="md:hidden flex justify-center items-center">
                        <p class="justificado text-black">
                            <strong>{{ __('Buques de carga') }}:</strong> {{ __('Con el objetivo de eficientizar y automatizar este servicio también hemos desarrollado en esta plataforma el servicio de arribo y despacho de los buques de carga, por lo que, a través de las navieras, a las cuales se les ha otorgado permiso de crear múltiples usuarios para que las mismas puedan realizar sus solicitudes en tiempo récord a las diferentes capitanías de puertos') }}.
                        </p>
                    </div>
                </div>
{{-- 
                <!-- Tercera parte -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <!-- Lado izquierdo -->
                    <div class="flex justify-center items-center">
                        <!-- La clase circle fue una clase que cree mediante css y es lo que me permite tener una imagen circular -->
                        <img class="rounded-full circle" src="{{ asset('images/Foto1.jpg') }}"
                            alt="Imagen de un barco" />
                    </div>
                    <!-- Lado derecho -->
                    <div class="flex justify-center items-center">
                        <p class="justificado text-black md:-ml-10 md:mr-24">
                            <strong>{{ __('Embarcaciones de Pesca') }}:</strong> {{ __('en proceso (para una
                            segunda fase) ')}}
                        </p>
                    </div>
                </div> --}}

            </div>

            <div class="container mx-auto md:hidden grid grid-cols-1">

                {{-- items 1 --}}
                <div class="flex px-3 py-3">
                    <div class="rounded overflow-hidden shadow-lg">
                        <img class="w-full" src="{{ asset('images/hero1.jpg') }}" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-sm mb-2">{{ __('Buques de carga') }}</div>
                            <p class="text-gray-700 text-sm justificado">
                                {{ __('Con el objetivo de eficientizar
                                y automatizar este servicio también hemos desarrollado en esta
                                plataforma el servicio de arribo y despacho de los buques de
                                carga, por lo que, a través de las navieras, a las cuales se les
                                ha otorgado permiso de crear múltiples usuarios para que las
                                mismas puedan realizar sus solicitudes en tiempo récord a las
                                diferentes capitanías de puertos') }}.
                            </p>
                        </div>
                        {{-- <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
                        </div> --}}
                    </div>
                </div>
{{-- items 1 --}}

{{-- items 2 --}}
<div class="flex px-3 py-3">
    <div class="rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{ asset('images/barcocontenedor.jpeg') }}" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-sm mb-2">{{ __('Conduce y Despacho de embarcaciones') }}</div>
            <p class="text-gray-700 text-sm justificado">
                {{ __('Este servicio está actualmente disponible única y exclusivamente para las embarcaciones de recreo') }}.
            </p>
        </div>
        {{-- <div class="px-6 py-4">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
        </div> --}}
    </div>
</div>
{{-- items 2 --}}


            </div>
        </section>

        <!-- Aqui para el fin de las dependencias -->

        <!-- Nueva sección que aparece al hacer scroll -->

        <section class="bg-blue-900">
            <h1 class="text-center pt-3 font-bold text-white text-2xl md:pt-4 md:text-4xl">
                {{ __('Enlaces de Interes') }}
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 p-4 md:p-12 w-full">
                <a href="https://cdp.mil.do/page/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-50 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/cdp2.png') }}" alt="" class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Comando Naval de Capitanías de Puertos y Autoridad Maritima') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center justificado">
                            {{ __('Se encarga de asegurar el cumplimiento de las leyes y los convenios internacionales en los espacios acuáticos, costeros y portuarios de la República Dominicana') }}.
                        </p>
                    </div>
                </a>
                <a href="https://cdp.mil.do/page/digmar/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-100 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/Direcciondegentedemar.png') }}" alt=""
                                class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Dirección de Gente de Mar') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center">
                            {{ __('Es una dirección encargada de coordinar y dirigir todo lo relativo al registro y gestión de la gente de mar') }}.
                        </p>
                    </div>
                </a>
                <a href="https://cdp.mil.do/page/dierp/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-100 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/direcciondeinspectores.png') }}" alt=""
                                class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Dirección de Inspectores por el Estado Rector de Puertos') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center justificado">
                            {{ __('Es la inspección de buques extranjeros que arriban voluntariamente a los puertos nacionales con el propósito de asegurar que se cumpla con las disposiciones establecidas en los convenios internacionales') }}.
                        </p>
                    </div>
                </a>
                <a href="https://cdp.mil.do/page/diseho/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-100 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/direcciondeservicioshidrograficos.png') }}" alt=""
                                class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Dirección de Servicios Hidrográficos y Oceanográficos') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center">
                            {{ __('Esta dirección lleva a cabo publicaciones sobre informaciones de seguridad marítima (avisos costeros y navales), correciones y actualizaciones de carta náutica') }}.
                        </p>
                    </div>
                </a>
                <a href="https://cdp.mil.do/page/emmd/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-100 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/escuelamarinamercante.png') }}" alt=""
                                class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Dirección de la Escuela de Marina Mercante') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center">
                            {{ __('Es un centro modelo de formación náutica, la cual fundamenta sus procesos en los estándares establecidos por la organización Marítima Internacional (OMI)') }}
                        </p>
                    </div>
                </a>
                <a href="https://cdp.mil.do/page/doa/" title="Acceder a la pagina" target="_blank">
                    <div class="p-6 h-full bg-gray-100 rounded-lg">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/direcciondeoperacionesacuaticas.png') }}" alt=""
                                class="w-64 h-64" />
                        </div>

                        <h2 class="font-semibold text-md text-center text-gray-800 mt-2">
                            {{ __('Dirección de Operaciones Acuaticas') }}
                        </h2>

                        <p class="mt-2 text-gray-800 text-center">
                            {{ __('Dirige, coordina y controla las actividades acuáticas de recreo y pesca con turistas en el litoral costero y los espacios maítimos de los distintos polos turísticos del país') }}.
                        </p>
                    </div>
                </a>
            </div>
        </section>
{{-- nuevo carousel al final  --}}
       
{{-- fin del nuevo carousel --}}
        <!-- START FOOTER -->
        <footer class="">
            <nav class="navbar fixed-bottom bg-blue-900">
                <div class="pb-2 flex justify-center items-center">
                    <p class="text-center text-white font-thin mb-0">
                        © {{ date('Y') }} - {{ __('Comando Naval de Capitanias de Puerto y Autoridad Maritima, ARD') }}.
                    </p>
                    {{-- <img src="{{ asset('images/bandera-de-la-republica-dominicana-imagen-animada-0001.gif') }}"
                        alt="" class="ml-2 h-4"/> --}}
                </div>
            </nav>
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script>
//             $(document).ready(function(){
//   $(".owl-carousel").owlCarousel();
// });
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

$('.owl-carousel').owlCarousel({
    items:1,
    margin:10,
    autoHeight:true
});


// document.getElementById('menu-button').addEventListener('click', function() {
//             var menu = document.getElementById('mobile-menu');
//             if (menu.classList.contains('hidden')) {
//                 menu.classList.remove('hidden');
//             } else {
//                 menu.classList.add('hidden');
//             }
//         });

        $(document).ready(function() {
            $('#menu-button').on('click', function() { 
                // $('#mainmenu').slideToggle('fast');
                $('#mainmenu, #mobile-menu').slideToggle(90);
            });
        });
         </script>
    </body>

</html>
