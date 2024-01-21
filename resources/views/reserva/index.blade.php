@extends('layouts.app')

@section('content')
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reservas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* Estilos de Tailwind CSS */
            @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        </style>
    </head>
    
    <div>

    <h1 class="text-center font-bold text-xl"> ADMINISTRA TUS RESERVAS </h1>
    
    <!-- Formulario de búsqueda -->
    <div class="bg-gray-100 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form action="/busquedareservas" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                    <div>
                        <label for="origen" class="block text-sm font-medium text-gray-700
                        bg-red-200 rounded-md px-2 py-1">
                            Origen
                        </label>
                        <select name="origen" id="origen" class="mt-1 focus:ring-indigo-500
                        focus:border-indigo-500 block w-full sm:text-sm border-gray-300
                        rounded-md placeholder-gray-400">
                            <option value="" disabled selected>Selecciona un origen</option>
                            <option value="lima">Lima</option>
                            <option value="arequipa">Arequipa</option>
                            <option value="cusco">Cusco</option>
                            <option value="trujillo">Trujillo</option>
                            <option value="piura">Piura</option>
                            <option value="chiclayo">Chiclayo</option>
                            <option value="ica">Ica</option>
                            <option value="huancayo">Huancayo</option>
                            <option value="tacna">Tacna</option>
                            <option value="puno">Puno</option>
                        </select>
                    </div>
                    <div>
                        <label for="destino" class="block text-sm font-medium text-gray-700 bg-red-200
                        rounded-md px-2 py-1">
                            Destino
                        </label>
                        <select name="destino" id="destino" class="mt-1 focus:ring-indigo-500
                        focus:border-indigo-500 block w-full sm:text-sm border-gray-300
                        rounded-md placeholder-gray-400">
                            <option value="" disabled selected>Selecciona un destino</option>
                            <option value="lima">Lima</option>
                            <option value="arequipa">Arequipa</option>
                            <option value="cusco">Cusco</option>
                            <option value="trujillo">Trujillo</option>
                            <option value="piura">Piura</option>
                            <option value="chiclayo">Chiclayo</option>
                            <option value="ica">Ica</option>
                            <option value="huancayo">Huancayo</option>
                            <option value="tacna">Tacna</option>
                            <option value="puno">Puno</option>
                        </select>
                    </div>
                    <div>
                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700
                        bg-red-200 rounded-md px-2 py-1">
                            Fecha de viaje
                        </label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1
                        focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                        border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="fecha_retorno" class="block text-sm font-medium text-gray-700
                        bg-red-200 rounded-md px-2 py-1">
                            Fecha de regreso (opcional)
                        </label>
                        <input type="date" name="fecha_retorno" id="fecha_retorno" class="mt-1
                        focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                        border-gray-300 rounded-md">
                    </div>
                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border
                        border-transparent text-base font-medium rounded-md shadow-sm text-white
                        bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-indigo-500">
                            Buscar
                        </button>
                        <a href="/home" class="inline-flex items-center px-4 py-2 border
                        border-transparent text-base font-medium rounded-md shadow-sm text-white
                        bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-indigo-500">
                            Ver viajes
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Numero de Asiento</th>
                        <th>Placa de Bus</th>
                        <th>Fecha de Salida</th>
                        <th>Fecha de Retorno</th>
                        <th>Cancelar reserva</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $info)
                        <tr>
                            <td>{{ $info->origen }}</td>
                            <td>{{ $info->destino }}</td>
                            <td>{{ $info->num_asiento }}</td>
                            <td>{{ $info->num_bus }}</td>
                            <td>{{ $info->fecha_inicio }}</td>
                            <td>{{ $info->fecha_retorno }}</td>
                            <td><a href="/cancelarreserva/{{$info->id_bus}}/{{$info->num_asiento}}">Cancelar</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>© 2023 - Todos los derechos reservados</p>
    </div>
@endsection
