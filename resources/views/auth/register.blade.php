@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <br>
                        <br>
                        <div class="row mb-3">
                            <label for="tipo_de_usuario" class="col-md-4 col-form-label text-md-end">
                                Tipo de usuario
                            </label>
                            <div class="col-md-6">
                                <select class="col-md-6" name="tipo_de_usuario" id="tipo_de_usuario">
                                    <option value="cliente">Cliente</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" id="ruc_field" style="display: none;">
                            <label for="ruc" class="col-md-4 col-form-label text-md-end">RUC</label>
                            <div class="col-md-6">
                                <input id="ruc" name="ruc" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3" id="direccion_field" style="display: none;">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">Direccion </label>
                            <div class="col-md-6">
                                <input id="direccion" name="direccion" type="text" class="form-control">
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Al cambiar el valor del campo "Tipo de usuario"
                                $("#tipo_de_usuario").change(function() {
                                    if ($(this).val() !== "empresa") {
                                        $("#ruc_field").hide();
                                        $("#direccion_field").hide(); // Mostrar el campo de "RUC"
                                    } else {
                                        $("#ruc_field").show(); // Ocultar el campo de "RUC"
                                        $("#direccion_field").show();
                                    }
                                });
                            });
                        </script>

                        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">
                            {{ __('Confirm Password') }}
                        </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password"
                                class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
