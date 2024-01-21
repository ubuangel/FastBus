<head>
    <title>Añadir/editar ruta</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('origen') }}
            {{ Form::text('origen', $rutum->origen,
                ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''),
                'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('destino') }}
            {{ Form::text('destino', $rutum->destino,
                ['class' => 'form-control' . ($errors->has('destino') ? ' is-invalid' : ''),
                'placeholder' => 'Destino']) }}
            {!! $errors->first('destino', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="" class="btn btn-primary" onclick="showSuccessAlert()">{{ __('Enviar datos') }}</button>
    </div>
</div>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Creando/actualizando ruta...',
            text: '¡Se mostrará en la pantalla si su ruta fue aceptada!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            didClose: () => {
                setTimeout(() => {
                    window.location.href = "{{ url('/ruta') }}";
                }, 3000); // Retraso de 3 segundos (3000 ms)
            }
        });
    }
</script>
