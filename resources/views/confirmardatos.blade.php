@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <div class="container justify-content-center">
        <div class="d-flex mb-5">
            <div class="btn-tab arrow ">
                <div>Elige tu asiento</div>
            </div>
            <div class="btn-tab arrow arrow-color">
                <div>Confirma tus datos</div>
            </div>
            <div class="btn-tab arrow">
                <div>Confirma tu reserva</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-propio">
                <span class="card-propio__title">Salida y llegada</span> <br>
                <div class="imagen-lateral"><br>
                    <img src="{{ asset('img/svg/bus-second-color.svg') }}" style="width: 40px;">
                    <p>{{$origen}} {{$fecha_inicio}}</p>
                </div>
                <div class="imagen-lateral">
                    <img src="{{ asset('img/svg/llegada-seconf-color.svg') }}" style="width: 40px;">
                    <p> {{$destino}} {{$fecha_retorno}} </p>
                </div>
                <div class="asientos-desc2">
                    <div class="asientos-monto">
                        <p>Asientos</p>
                        <p id="monto">S/{{$informacion_asientos['monto_input']}}</p>
                    </div>
                    <form method="GET" action="{{ route('confirmarreserva',[$id_viaje,$id_bus])}}">
                        <input type="hidden" id="monto_input" name="monto_input"
                        value="{{$informacion_asientos['monto_input']}}">
                        <?php $i = 0 ?>
                        @while ($i < $capacidad)
                            <input id="asiento{{$i+1}}" name="asiento{{$i+1}}"
                            type="hidden" value="{{$informacion_asientos['asiento'.strval($i+1)]}}">
                            <?php ++$i ?>
                        @endwhile
                        <button type="submit" class="button-reservar"
                        style="font-size: 20px; width: 400px; height: 50px;">Continuar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cliente-box">
                <div class="cliente-form">
                    <div class="form-group">
                        <label class="form-label">Nombre del Cliente</label>
                        <div class="form-value">
                            <span class="form-text" style="font-size: 18px; font-weight: bold;">
                                {{ Auth::user()->name }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Correo del Cliente</label>
                        <div class="form-value">
                            <span class="form-text" style="font-size: 18px; font-weight: bold;">
                                {{ Auth::user()->email }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="terminos-condiciones">
                    <input type="checkbox" id="terminos" name="terminos" class="terminos-checkbox">
                    <label for="terminos" style="font-size: 18px; font-weight: bold;">
                        Acepto los <a href="{{ url('/terminos') }}" id="terminos-link"
                            style="font-size: 18px; font-weight: bold;">
                            Términos y Condiciones
                        </a>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.button-reservar').on('click', function(e) {
                if (!$('.terminos-checkbox').is(':checked')) {
                    e.preventDefault(); // Evita que se realice la acción predeterminada del botón
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Debes aceptar los términos y condiciones',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        didClose: () => {
                            $('.terminos-checkbox').prop('checked', true);
                            // Marca automáticamente el checkbox al cerrar la alerta
                        }
                    });
                }
            });
        });
    </script>
</body>

@endsection
