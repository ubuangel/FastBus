@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FastBusu</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <!-- Estilos de Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div>
        <h1 class="text-center font-bold text-xl">RESERVA TU ASIENTO AQUÍ!</h1>

        <!-- Formulario de búsqueda -->
        <div class="bg-gray-100 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <form action="/busquedaviajes" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                        <div>
                            <label for="origen" class="block text-sm font-medium
                            text-gray-700 bg-red-200 rounded-md px-2 py-1">
                                Origen
                            </label>
                            <select name="origen" id="origen" class="mt-1
                            focus:ring-indigo-500 focus:border-indigo-500 block w-full
                            sm:text-sm border-gray-300 rounded-md placeholder-gray-400">
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
                            <label for="destino"
                            class="block text-sm font-medium text-gray-700 bg-red-200 rounded-md px-2 py-1">
                                Destino
                            </label>
                            <select name="destino" id="destino"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full
                            sm:text-sm border-gray-300 rounded-md placeholder-gray-400">
                                <option value="" disabled selected>Selecciona un destino</option>
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
                            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700
                            bg-red-200 rounded-md px-2 py-1">Fecha de viaje</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                            block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="fecha_retorno" class="block text-sm font-medium text-gray-700
                            bg-red-200 rounded-md px-2 py-1">Fecha de regreso (opcional)</label>
                            <input type="date" name="fecha_retorno" id="fecha_retorno"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500
                            block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border
                            border-transparent text-base font-medium rounded-md shadow-sm text-white
                            bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2
                            focus:ring-indigo-500">
                                Buscar
                            </button>
                            <a href="/reservas"
                                class="inline-flex items-center px-4 py-2 border border-transparent
                                text-base font-medium rounded-md shadow-sm text-white bg-red-500
                                hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2
                                focus:ring-indigo-500">
                                    Ver reservas
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabla en viñetas -->
        <div class="card-body">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($datos as $info)
                    <div class="w-full max-w-xl bg-gray-200 p-4 mb-4 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">{{ $info->origen }} - {{ $info->destino }}</h2>
                                <p class="text-gray-600">{{ $info->fecha_inicio }}</p>
                            </div>
                        </div>
                        <a href="{{ route('seleccionarbus', $info->id_viaje) }}"
                            class="block mt-4 px-6 py-2 bg-blue-500
                            text-white font-bold rounded-lg text-center">
                            Seleccionar
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="footer">
            <p>© 2023 - Todos los derechos reservados</p>
        </div>
    </div>
@endsection
