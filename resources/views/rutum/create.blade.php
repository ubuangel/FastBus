@extends('layoutsBusiness.app')

@section('template_title')
    {{ __('Create') }} Rutum
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Creando nueva ruta</span>
                    </div>
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-success" style="color:#FF0000;background:#FFA9A9;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('ruta.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('rutum.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
