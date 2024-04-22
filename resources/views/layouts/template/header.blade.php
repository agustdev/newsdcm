<!DOCTYPE html>
<html lang="es-DO">

    <head>
        <meta charset="utf-8">
        <title>@yield('titulo', 'Titulo Modulo') | SACOM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta
            content="Sistema Administrativo de Conduce y Despacho | Comando Naval de Capitania de Puertos y Autoridad Maritima"
            name="description">
        <meta content="CDP-SACOM" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/images/capitania_web2_sm.png') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
        <style>
            body[data-leftbar-theme=dark] .leftside-menu {
                background: #2a2d69 !important;
            }

            body[data-leftbar-theme=dark] .leftside-menu .logo {
                background: #2a2d69 !important;
            }

            .select2-container--default {
                .select2-selection--single {
                    border-color: #fff;
                    height: 60px;
                    padding: 7.5px 0;
                    border-radius: 0;

                    .select2-selection__arrow {
                        height: 48px;
                    }
                }
            }

            .select2-dropdown {
                border-radius: 0;
                box-shadow: #444 0px 3px 5px;
                border: 0;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @stack('css')
    </head>

    <body class="loading"
        data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
