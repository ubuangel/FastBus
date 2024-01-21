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
    @if ($message = Session::get('fail'))
        <div class="alert alert-success" style="color:#FF0000;background:#FFA9A9;">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container justify-content-center">
        <div class="d-flex mb-5">
            <div class="btn-tab arrow arrow-color">
                <div>Elige tu asiento</div>
            </div>
            <div class="btn-tab arrow">
                <div>Confirma tus datos</div>
            </div>
            <div class="btn-tab arrow">
                <div>Confirma tu reserva</div>
            </div>
        </div>
    </div>
    <div style="display: none" id="bus{{$id_bus}}"></div>
    <div class="container">
                    
        <form method="GET" action="{{ route('confirmardatos',[$id_viaje, $id_bus]) }}">
            <input type="hidden" id="monto_input" name="monto_input" value="0">
            <div class="row">
                <div class="col-md-8">
                    <div class="croquis_bus_general">
                        <div class="container">
                            <div class="column">
                                <?php $i = 0 ?>
                                @while ($i < $capacidad)
                                    <input id="asiento{{$i+1}}" name="asiento{{$i+1}}" type="hidden" value="">
                                    <?php if($i % 8 == 0 && $i!=0){?>
                                        </div>
                                        <div class="column">
                                    <?php }?>
                                    <?php if($i % 16 == 0 && $i!=0){?>
                                        <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                                        <div class="seatempty col4"></div>
                                        <div class="seatempty col4"></div>
                                        <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                                        <div class="seatempty col4"></div>
                                        <div class="seatempty col4"></div>
                                        <img class="h-8 w-auto" src="{{ asset('img/svg/tv.svg') }}" alt="tv" >
                                        </div>
                                        <div class="column">
                                    <?php }?>
                                    <?php if($estados[$i] == '0'){ ?>
                                        <button type="button"
                                            class="seat col4 asientoelegible" id="{{$i+1}}"
                                            value="reservado" data-bs-toggle="tooltip" data-precio="Ocupado">
                                            {{$i+1}}
                                        </button>
                                    <?php }else{?>
                                        <button type="button"
                                        class="seat col4 asientoelegible" id="{{$i+1}}"
                                        data-bs-toggle="tooltip" data-precio="120.00" value="120">
                                            {{$i+1}}
                                        </button>
                                    <?php }?>
                                    <?php ++$i ?>
                                @endwhile
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="empresa-description mb-2">
                        <div class="card-propio">
                            <span class="card-propio__title">Salida y llegada</span>
                            <div class="imagen-lateral">
                                <img  src="{{ asset('img/svg/bus-second-color.svg') }}" style="width: 40px;">
                                <p>{{$origen}} {{$fecha_inicio}}</p>
                            </div>
                            <div class="imagen-lateral">
                                <img src="{{ asset('img/svg/llegada-seconf-color.svg') }}" style="width: 40px;">
                                <p> {{$destino}} {{$fecha_retorno}} </p>
                            </div>
                            <div class="asientos-desc2">
                                <div class="asientos-monto">
                                    <p>Asientos</p>
                                    <p id="monto">S/</p>
                                </div>
                                <button type="submit" class="button-reservar">RESERVAR</button>
                            </div>
                        </div>
                        <br>
                        <div class="card-propio">
                            <span class="card-propio__title">Caracteristicas</span>
                            <div class="columna_caracteristica">
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/mascotas.svg') }}" style="width: 40px;">
                                    <p> Mascotas</p>
                                </div>
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/cortinas.svg') }}" style="width: 40px;">
                                    <p>Cortinas</p>
                                </div>
                            </div>
                            <div class="columna_caracteristica">
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/usb.svg') }}" style="width: 40px;">
                                    <p>Cargados USB</p>
                                </div>
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/pantalla_led.svg') }}" style="width: 40px;">
                                    <p>Pantalla Led</p>
                                </div>
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/aire_acondicionado.svg') }}" style="width: 40px;">
                                    <p>Aire Acondicionado</p>
                                </div>
                                <div class="imagen-lateral-carac">
                                    <img src="{{ asset('img/svg/bañoS.svg') }}" style="width: 40px;">
                                    <p>Baño urinario</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
