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

    <!-- Contenido principal -->
    <div id="contenido-principal" class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center h-full">
                <h1 class="text-4xl font-bold mb-4 text-center">Nuestros servicios para ti</h1>
                <img src="{{ asset('img/busGo.png') }}" alt="Bus" class="h-48 w-auto mx-auto mb-4">
                <p class="text-gray-800">
                            FastBus es una empresa líder en la venta de pasajes de autobús en línea, brindando un servicio conveniente y confiable para viajeros de todo el país. Nuestros servicios están diseñados para ofrecerte una experiencia de reserva de pasajes fácil y segura, permitiéndote explorar una amplia variedad de rutas y destinos en todo el Perú.
                        </p>
                        <ul class="list-disc list-inside mt-4">
                            <li>Reserva en línea: Nuestro sitio web te permite realizar reservas de pasajes de autobús de manera rápida y sencilla. Puedes explorar diferentes opciones de rutas, horarios y compañías de autobuses, y seleccionar la opción que se adapte mejor a tus necesidades.</li>
                            <li>Amplia disponibilidad: Trabajamos con una extensa red de compañías de autobuses en todo el país, lo que nos permite ofrecerte una amplia gama de opciones para tus viajes. Desde destinos populares hasta lugares más remotos, FastBus te brinda acceso a una amplia disponibilidad de pasajes.</li>
                            <li>Precios competitivos: Nos esforzamos por ofrecerte los mejores precios en pasajes de autobús. A través de acuerdos y alianzas con diversas compañías de transporte, podemos proporcionarte tarifas competitivas y ofertas especiales, lo que te permite ahorrar dinero en tus viajes.</li>
                            <li>Seguridad y confiabilidad: Valoramos tu seguridad y nos aseguramos de que todas las compañías de autobuses con las que trabajamos cumplan con altos estándares de seguridad. Te proporcionamos opciones de viaje confiables y cómodas para que puedas viajar con tranquilidad.</li>
                            <li>Servicio al cliente: Nuestro equipo de servicio al cliente está disponible para ayudarte en cada paso del proceso de reserva. Si tienes alguna pregunta o necesitas asistencia, estamos aquí para brindarte el apoyo necesario y asegurarnos de que tengas una experiencia satisfactoria con FastBus.</li>
                        </ul>
                <a href="#" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded mt-4 inline-block">Reserva ahora</a>
            </div>
        </div>
    </div>




</body>
</html>
