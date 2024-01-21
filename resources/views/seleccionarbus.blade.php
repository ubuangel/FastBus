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
        <h1 class="text-center font-bold text-xl">ELIJA UNO DE LOS BUSES DISPONIBLES</h1>
        <br><br>
        <!-- Tabla en viñetas -->
        <div class="card-body">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($buses as $bus)
                    <div class="w-full max-w-xl bg-gray-200 p-4 mb-4 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">{{$bus->num_bus}}</h2>
                                <p class="text-gray-600">Asientos: {{$bus->capacidad}}</p>
                            </div>
                        </div>
                        <a href="{{ route('elegirasientos', [$id_viaje, $bus->id_bus]) }}"
                            class="block mt-4 px-6 py-2 bg-green-500
                            text-white font-bold rounded-lg text-center">
                            Elegir
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
