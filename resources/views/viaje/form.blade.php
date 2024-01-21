<head>
    <title>Añadir/actualizar viaje</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
    <!-- Agrega el enlace al archivo JS de SweetAlert -->
</head>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $viaje->fecha_inicio,
                ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''),
                'placeholder' => 'fecha_inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_retorno') }}
            {{ Form::date('fecha_retorno', $viaje->fecha_retorno,
                ['class' => 'form-control' . ($errors->has('fecha_retorno') ? ' is-invalid' : ''),
                'placeholder' => 'Fecha Retorno']) }}
            {!! $errors->first('fecha_retorno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="id_ruta">Ruta</label>
            {!! $errors->first('id_ruta', '<div class="invalid-feedback">:message</div>') !!}
            <select id="id_ruta" name="id_ruta" class="form-control{{$errors->has('id_ruta') ? ' is-invalid' : ''}}" >
            @foreach ($rutas as $ruta)
                <option value="{{$ruta->id_ruta}}">{{$ruta->origen}} - {{$ruta->destino}}</option>
            @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="" class="btn btn-primary" onclick="showSuccessAlert()">{{ __('Enviar datos') }}</button>
    </div>
    </div>
</div>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Creando/actualizando viaje...',
            text: '¡Su viaje se mostrará en pantalla si es que fue creado/actualizado correctamente!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            didClose: () => {
                setTimeout(() => {
                    window.location.href = "{{ url('/viaje') }}";
                }, 3000); // Retraso de 3 segundos (3000 ms)
            }
        });
    }
</script>