@include('layouts.template.header')
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="/" class="logo text-center logo-light">
            <span class="logo-lg" style="padding: 5px">
                <img src="{{ asset('assets/images/capitania_web2.png') }}" alt="" height="32">
            </span>
            <span class="logo-sm" style="padding: 5px">

                <img src="{{ asset('assets/images/capitania_web2_sm.png') }}" alt="" height="32">
            </span>
        </a>

        <!-- LOGO -->
        <a href="/" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo_sm_dark.png') }}" alt="" height="16">
            </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>

            <!--- Sidemenu -->
            @include('layouts.template.menu')
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">

                <ul class="list-unstyled topbar-menu float-end mb-0">
                    {{-- <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li> --}}

                    {{-- notifications --}}
                    {{-- <x-notifications-admin></x-notifications-admin> --}}
                    {{-- end notifications --}}


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <span class="account-user-avatar">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="user-image"
                                        class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name mt-2">{{ Auth::user()->name }}</span>
                                    {{-- <span class="account-position">{{ !empty(Auth::user()->roles)?
                                    Auth::user()->roles()->first()->name: '' }}</span> --}}
                                </span>
                            @else
                                <span>
                                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                                    {{-- <span class="account-position">{{ !empty(Auth::user()->roles)?
                                    Auth::user()->roles()->first()->name: '' }}</span> --}}
                                </span>
                            @endif
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('Administrar cuenta') }}</h6>
                            </div>
                            <a href="{{ route('profile.show') }}" class="dropdown-item"><i
                                    class="mdi mdi-account-cog me-1"></i>{{ __('Perfil') }}</a>
                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>{{ __('Cerrar Sesión') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

                <ul class="list-unstyled topbar-menu float-end mb-0 mt-2">

                    <li class="dropdown notification-list">
                        <form action="{{ route('lang.switch') }}" method="POST">
                            @csrf
                            <select onchange="this.form.submit()" name="language" id="language"
                                class="mr-2 mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 mb-6 changeLang">
                                <option value="es">-Selecicone su idioma-</option>
                                @foreach (Config::get('languages') as $lang => $language)
                                    <option value="{{ $language['flag'] }}"
                                        {{ app()->getLocale() === $language['flag'] ? 'selected' : '' }}
                                        data-img="{{ asset('images/' . $language['image']) }}">
                                        {{ $language['display'] }}</option>
                                @endforeach
                                {{-- <option data-img-width="24px" data-img-height="24px" value="es"
                                    {{ session()->get('locale') == 'es' ? 'selected' : '' }}
                                    data-img="{{ asset('images/do.svg') }}"> ESPAÑOL</option>
                                <option data-img-width="24px" data-img-height="24px" value="en"
                                    {{ session()->get('locale') == 'en' ? 'selected' : '' }}
                                    data-img="{{ asset('images/en.svg') }}">ENGLISH</option>
                                <option data-img-width="24px" data-img-height="24px" value="fr"
                                    {{ session()->get('locale') == 'fr' ? 'selected' : '' }}
                                    data-img="{{ asset('images/fr.svg') }}"></option> --}}
                            </select>
                        </form>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="app-search dropdown d-none d-lg-block">

                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-notes font-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-life-ring font-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-cog font-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                        alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                @yield('breadcrumbs')
                            </div>
                            <h4 class="page-title">
                                @if (isset($header))
                                    {{ $header }}
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
                <x-banner />

                <!-- end page title -->
                {{ $slot }}

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        @include('layouts.template.copyright')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right Sidebar -->

<!-- /End-bar -->
@include('layouts.template.footer')
