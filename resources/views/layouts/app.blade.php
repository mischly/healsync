<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo1-white.png') }}">
    <title>{{ config('app.name', 'Healsync') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- CSS --->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>  
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo2.png') }}" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Menu Utama di Tengah -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('page.artikel') }}" class="nav-link {{ request()->is('artikel') ? 'active' : '' }}">ARTIKEL</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('page.layanan') }}" class="nav-link {{ request()->is('layanan') ? 'active' : '' }}">LAYANAN</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('page.about') }}" class="nav-link {{ request()->is('tentang-kami') ? 'active' : '' }}">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimoni.index') }}" class="nav-link {{ request()->is('testimoni') ? 'active' : '' }}">REVIEW</a>
                        </li>
                    </ul>

                    <!-- Login/Register tetap di kanan -->
                    <ul class="navbar-nav">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        @if (!View::hasSection('no-footer'))
            @include('partials.footer')
        @endif

        @stack('scripts')
    </div>
</body>
</html>
