<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('num_bus','Placa') }}
            {{ Form::text('num_bus', $bus->num_bus,
                ['class' => 'form-control' . ($errors->has('num_bus') ? ' is-invalid' : ''),
                'placeholder' => 'Num Bus']) }}
            {!! $errors->first('num_bus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capacidad','Capacidad') }}
            {{ Form::text('capacidad', $bus->capacidad,
                ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''),
                'placeholder' => 'Capacidad']) }}
            {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            <select id="estado" name="estado" class="form-control{{$errors->has('estado') ? ' is-invalid' : ''}}" >
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('id_viaje','Viaje asignado') }}
            {!! $errors->first('id_viaje', '<div class="invalid-feedback">:message</div>') !!}
            <select id="id_viaje" name="id_viaje"
            class="form-control{{$errors->has('id_viaje') ? ' is-invalid' : ''}}" >
                @foreach ($viajes as $viaje)
                <option value="{{$viaje->id_viaje}}">
                    Fechas: {{$viaje->fecha_inicio}} - {{$viaje->fecha_retorno}};
                    Ruta: {{$viaje->origen}} - {{$viaje->destino}}
                </option>
                @endforeach
            </select>
            <br>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar datos') }}</button>
    </div>
</div>