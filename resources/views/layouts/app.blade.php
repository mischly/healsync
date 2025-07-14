<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo1-white.png') }}?v=1">
    <title>{{ config('app.name', 'Healsync') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
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
                @php
                    $user = Auth::user();
                    $dashboardUrl = route('page.index');

                    if ($user) {
                        if ($user->hasRole('admin')) {
                            $dashboardUrl = route('admin.dashboard');
                        } elseif ($user->hasRole('mentor')) {
                            $dashboardUrl = route('mentor.dashboard');
                        }
                    }
                @endphp

                <a class="navbar-brand" href="{{ $dashboardUrl }}">
                    <img src="{{ asset('img/logo2.png') }}" alt="Logo" height="30">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 100px;">
                    <!-- Navigasi Tengah -->
                    <ul class="navbar-nav mx-auto">
                        @guest
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
                                <a href="{{ route('page.review') }}" class="nav-link {{ request()->is('review') ? 'active' : '' }}">REVIEW</a>
                            </li>
                        @else
                        {{-- Navbar admin --}}
                        @if (Auth::user()->hasRole('admin'))
                        
                        @endif
                        
                        {{-- Navbar mentor --}}
                        @if (Auth::user()->hasRole('mentor'))
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ request()->is('mentor') ? 'active' : '' }}">DASHBOARD MENTOR</a>
                        </li>
                        @endif
                        
                        {{-- Navbar user biasa --}}
                            @if (Auth::user()->hasRole('user'))
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
                                    <a href="{{ route('page.review') }}" class="nav-link {{ request()->is('review') ? 'active' : '' }}">REVIEW</a>
                                </li>
                            @endif
                        @endguest
                    </ul>

                    <!-- Navigasi Kanan -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item login">    
                                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item register">
                                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown user-dropdown">
                                <a id="navbarDropdown" class="nav-link no-underline dropdown-toggle user-avatar no-underline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img rounded-circle" width="30" height="30">
                                    @else
                                        <i class="bi bi-person-circle fs-2 text-secondary"></i>
                                    @endif
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end animated-dropdown" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/">
                                            <i class="bi bi-person me-2"></i> Profil
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
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

        {{-- Sweetalert Toast ver --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didDestroy: function () {
                    fetch("{{ route('flash.clear') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({})
                    });
                }
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didDestroy: function () {
                    fetch("{{ route('flash.clear') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content'),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({})
                    });
                }
            });
        </script>
    @endif

    @stack('scripts')

</body>
</html>
