@extends('layoutsBusiness.app')

@section('template_title')
    {{ $rutum->name ?? __('Show')}}"}} Rutum
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrando datos de ruta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ruta.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Ruta:</strong>
                            {{ $rutum->id_ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Origen:</strong>
                            {{ $rutum->origen }}
                        </div>
                        <div class="form-group">
                            <strong>Destino:</strong>
                            {{ $rutum->destino }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
