<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
    <!-- Barra de navegación -->
    <nav class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-auto" src="{{ asset('img/logo.png') }}" alt="Logo">
                    </div>
                    <div class="ml-4 text-white">
                        <a href="{{ url('/') }}" class="font-semibold text-xl">Inicio</a>
                        <a href="{{ url('/acerca') }}"class="ml-4 font-semibold text-xl">Acerca de</a>
                        <a href="{{ url('/soporte') }}" class="ml-4 font-semibold text-xl">Soporte</a>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="ml-4 text-white">
                            @auth
                                <a href="{{ url('/home') }}" class="font-semibold text-xl">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-xl">Ingresar</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-xl">Registrate</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Formulario de búsqueda -->
    <div class="bg-gray-100 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form action="{{route('login')}}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                    <div>
                        <label for="origen" class="block text-sm font-medium text-gray-700 bg-red-200 rounded-md px-2 py-1">Origen</label>
                        <select name="origen" id="origen" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md placeholder-gray-400">
                            <option value="" disabled selected>Selecciona un origen</option>
                            <option value="Lima">Lima</option>
                            <option value="Arequipa">Arequipa</option>
                            <option value="Cusco">Cusco</option>
                            <option value="Trujillo">Trujillo</option>
                            <option value="Piura">Piura</option>
                            <option value="Chiclayo">Chiclayo</option>
                            <option value="Ica">Ica</option>
                            <option value="Huancayo">Huancayo</option>
                            <option value="Tacna">Tacna</option>
                            <option value="Puno">Puno</option>
                            <option value="LaLibertad">La Libertad</option>
                            <option value="Ucayali">Ucayali</option>
                            <option value="Lambayeque">Lambayeque</option>
                        </select>
                    </div>
                    <div>
                        <label for="destino" class="block text-sm font-medium text-gray-700 bg-red-200 rounded-md px-2 py-1">Destino</label>
                        <select name="destino" id="destino" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md placeholder-gray-400">
                            <option value="" disabled selected>Selecciona un origen</option>
                            <option value="Lima">Lima</option>
                            <option value="Arequipa">Arequipa</option>
                            <option value="Cusco">Cusco</option>
                            <option value="Trujillo">Trujillo</option>
                            <option value="Piura">Piura</option>
                            <option value="Chiclayo">Chiclayo</option>
                            <option value="Ica">Ica</option>
                            <option value="Huancayo">Huancayo</option>
                            <option value="Tacna">Tacna</option>
                            <option value="Puno">Puno</option>
                            <option value="LaLibertad">La Libertad</option>
                            <option value="Ucayali">Ucayali</option>
                            <option value="Lambayeque">Lambayeque</option>
                        </select>
                    </div>
                    <div>
                        <label for="fecha" class="block text-sm font-medium text-gray-700 bg-red-200 rounded-md px-2 py-1">Fecha de viaje</label>
                        <input type="date" name="fecha" id="fecha" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="fecha-regreso" class="block text-sm font-medium text-gray-700 bg-red-200 rounded-md px-2 py-1">Fecha de regreso (opcional)</label>
                        <input type="date" name="fecha-regreso" id="fecha-regreso" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Contenido principal -->
    <div class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <img src="{{ asset('img/busGo.png') }}" alt="Phone" class="h-48 w-auto mx-auto">
                    </div>
                    <div>
                        <h2 class="text-4xl font-bold mb-4">Venta de pasajes  Interprovinciales</h2>
                        <p class="text-gray-800">Reserva tus pasajes en línea con FastBus y disfruta de una experiencia incomparable. Explora rutas en varias ciudades y encuentra los mejores precios de boletos. ¡Descubre los	 beneficios de FastBus!</p>
                        <a href="/login" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded mt-4 inline-block">Reserva ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
