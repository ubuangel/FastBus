@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Términos y Condiciones</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
        /* Estilos generales */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2; /* Cambiar el color de fondo aquí */
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
  font-size: 36px;
  font-weight: bold;
  color: black;
}

.content {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-top: 24px;
}

p, ol, ul {
  margin-bottom: 16px;
}

/* Estilos responsive */
@media (max-width: 600px) {
  .container {
    padding: 10px;
  }

  h1 {
    font-size: 24px;
  }

  .content {
    padding: 10px;
  }

  h2 {
    margin-top: 16px;
    font-size: 18px;
  }
}
    </style>
</head>

<body>
  <div class="container">
    
    <div class="content">
    <h1 style="font-size: 36px; font-weight: bold; color: black; text-align: center;">Términos y Condiciones</h1><br>
      <p>Estos son los términos y condiciones de nuestra empresa de reserva de boletos de asientos para viajes en autobús:</p>
      <ol>
        <li>
          <h2>Reservaciones</h2>
          <p>Realizamos únicamente reservaciones de boletos de asientos para viajes en autobús a través de nuestro sitio web. No ofrecemos venta de boletos físicos.</p>
        </li>
        <li>
          <h2>Proceso de Reserva</h2>
          <p>Para reservar un boleto de asiento, debes seguir los siguientes pasos:</p>
          <ol>
            <li>1. Selecciona el viaje deseado y elige tu asiento disponible.</li>
            <li>2. Verifique los datos requeridos, incluyendo tu nombre y dirección de correo electrónico.</li>
            <li>3. Revisa y confirma los detalles de tu reserva.</li>
            <li>4. Recibirás una confirmación por correo electrónico con los detalles de tu reserva.</li>
          </ol>
        </li>
        <li>
          <h2>Cancelaciones y Reembolsos</h2>
          <p>Para cancelar una reserva y solicitar un reembolso, debes comunicarte con nuestro equipo de atención al cliente al menos 24 horas antes de la fecha de salida programada. Ten en cuenta que pueden aplicar cargos por cancelación.</p>
        </li>
        <li>
          <h2>Privacidad y Seguridad</h2>
          <p>Respetamos tu privacidad y protegemos tus datos personales. No compartiremos tu información con terceros sin tu consentimiento. Utilizamos medidas de seguridad para proteger tus datos durante la transmisión y el almacenamiento.</p>
        </li>
        <li>
          <h2>Contacto</h2>
          <p>Si tienes alguna pregunta o inquietud sobre nuestros términos y condiciones, por favor contáctanos a través de los siguientes medios:</p>
          <ul>
            <li>Teléfono: +51925238121</li>
            <li>Correo electrónico: rgutierrezar@unsa.edu.pe</li>
          </ul>
        </li>
      </ol>
    </div>
  </div>
</body>
@endsection
