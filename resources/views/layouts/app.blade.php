@yield('sesiones')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CDShop</title>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('img/logo.jpg')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('css')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('js')


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand bg-white text-black px-4 rounded-pill" href="{{ url('/carrito') }}">
                    <span class="material-icons pt-2">shopping_cart</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('Inicio', 'Inicio') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/articulos') }}">
                            {{ config('Articulos', 'Articulos') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/nosotros') }}">
                            {{ config('Nosotros', 'Nosotros') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/contacto') }}">
                            {{ config('Contacto', 'Contacto') }}
                        </a>
                        
                        <?php
                            if(auth()->user()){
                                if(auth()->user()->type === 'admin'){
                                    echo "
                                    <a class='navbar-brand' href=". url('/inventario') .">
                                        ". config('Inventario', 'Inventario') ."
                                    </a>
                                    ";
                                }
                            }
                        ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cuenta.index') }}">Cuenta de usuario</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
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

        <main class="container-fluid p-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
