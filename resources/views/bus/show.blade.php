@extends('layouts.app')

@section('template_title')
    {{ $bus->name ?? __('Show') }} Bus 
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bus</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('buses.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Bus:</strong>
                            {{ $bus->id_bus }}
                        </div>
                        <div class="form-group">
                            <strong>Placa:</strong>
                            {{ $bus->num_bus }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $bus->capacidad }} asientos
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $bus->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Viaje:</strong>
                            {{ $bus->id_viaje }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
