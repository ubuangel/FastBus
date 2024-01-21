@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Agrega el enlace al archivo JS de SweetAlert -->
</head>

<body>
    <div class="container justify-content-center">
        <div class="d-flex mb-5">
            <div class="btn-tab arrow ">
                <div>Elige tu asiento</div>
            </div>
            <div class="btn-tab arrow ">
                <div>Confirma tus datos</div>
            </div>
            <div class="btn-tab arrow arrow-color">
                <div>Confirma tu reserva</div>
            </div>
        </div>
    </div>
    <div class="row text-center justify-content-center">
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
                    <form method="GET" action="{{route('realizarreserva',[$id_viaje,$id_bus]) }}">
                        <?php $i=0?>
                        @while($i < $capacidad)
                            <input id="asiento{{$i+1}}" name="asiento{{$i+1}}"
                            type="hidden" value="{{$informacion_asientos['asiento'.strval($i+1)]}}">
                            <?php ++$i?>
                        @endwhile
                        <button type="submit" class="button-reservar"
                        style="font-size: 20px; width: 400px; height: 50px;">
                            Continuar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.button-reservar').addEventListener('click', function() {
            Swal.fire({
                title: '¡Reserva confirmada!',
                text: 'Su reserva ha sido confirmada con éxito',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then(function() {
                window.location.href = '{{ url("/home") }}';
            });
        });
    </script>
</body>
@endsection
