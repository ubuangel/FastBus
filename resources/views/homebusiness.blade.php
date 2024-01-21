
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* Estilos de Tailwind CSS */
            @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        </style>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Control del Administrador</title>
        <!-- Incluir los estilos de Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
        <!-- Incluir los estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FastBus</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Estilos de Tailwind CSS */
            @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        </style>
    </head>

    <body>
        <div id="app">
            <!-- Barra de navegación -->
        <nav class="bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-auto" src="{{ asset('img/logo.png') }}" alt="Logo">
                        </div>
                        <div class="ml-4 text-white">
                            <a href="{{ url('/home') }}" class="font-semibold text-xl">Inicio</a>
                            @auth
                                <a href="{{ url('/ruta') }}" class="ml-4 font-semibold text-xl">Crear Ruta</a>
                                <a href="{{ url('/viajes') }}" class="ml-4 font-semibold text-xl">Crear Viaje</a> 
                                <a href="{{ url('/buses') }}" class="ml-4 font-semibold text-xl">Registrar Bus</a> 
                            @endauth
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <div class="ml-4 text-white">
                                    @auth
                                        <a href="{{ url('/home') }}" class="font-semibold text-xl">Home</a>
                                        
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-xl">Ingresar</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                            class="ml-4 font-semibold text-xl">
                                                Registrate
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white;"
                                class=" ml-4 font-semibold text-xl nav-link dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" 
                                aria-expanded="false" v-pre>
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
                    </div>
                </div>
            </div>
        </nav>
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full"> Deseas Crear Rutas y Viajes</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Crea tu viaje con FastBus
            </h1>
            <p class="leading-normal text-2xl mb-8">
                FastBus es una plataforma que te permite crear tus viajes como empresa.
            </p>
            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
            <img class="w-full md:w-4/5 z-50" src="{{ asset('img/dashboard.png') }}" />
            </div>

        </div>
    
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>


