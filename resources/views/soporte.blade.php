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

    <div class="container mx-auto py-8">
  <div class="bg-white shadow-lg p-6">
    <h1 class="text-4xl font-bold text-center mb-4">Equipo de Desarrollo</h1>
    <h4 class="text-xl font-bold">Team FastBus</h4>
    <p class="mt-4">
      Este proyecto fue desarrollado por los estudiantes de Ciencias de la Computación
      de la UNSA.
    </p>
  </div>

  <h2 class="text-3xl text-center mt-8">Medios de Contacto</h2>

  <table class="table-auto w-full mt-4">
    <thead>
      <tr>
        <th class="px-4 py-2">Cargo</th>
        <th class="px-4 py-2">Encargado(s)</th>
        <th class="px-4 py-2">Correo Electrónico</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="border px-4 py-2">Desarrolladores Backend</td>
        <td class="border px-4 py-2">
          Ronald Romario Gutierrez Arratia  
          <br>
          Uberto Garcia Caceres 
          <br> 
          Jheeremy Manuel Alvarez Astete
        </td>

        <td class="border px-4 py-2">
          rgutierrez@unsa.edu.pe 
          <br> 
          ugarcia@unsa.edu.pe 
          <br> 
          jalvarezas@unsa.edu.pe 
        </td>
      </tr>
      <tr>
        <td class="border px-4 py-2">Desarrolladores Frontend</td>
        <td class="border px-4 py-2">Ronald Romario Gutierrez Arratia  <br>
        <td class="border px-4 py-2">rgutierrez@unsa.edu.pe</td>
      </tr>
      <tr>
        <td class="border px-4 py-2">Diseñador</td>
        <td class="border px-4 py-2">Marko Marcelo Ituccayasi Umeres</td>
        <td class="border px-4 py-2">mituccayasi@unsa.edu.pe</td>
      </tr>
      <tr>
        <td class="border px-4 py-2">Documentación</td>
        <td class="border px-4 py-2">Erick Jesus Perez Chipa <br> Albert Daniel Llica Alvarez </td>
        <td class="border px-4 py-2">eperezchi@unsa.edu.pe <br> allicaa@unsa.edu.pe</td>
      </tr>
    </tbody>
  </table>

  <h1 class="text-4xl font-bold text-center mt-8">Contribución</h1>

  <div class="mt-8 text-center">
    <p class="mb-4">¿Deseas contribuir con el desarrollo de este proyecto?</p>
    <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg inline-block">Ver más detalles</a>
  </div>
</div>

</body>
</html>
