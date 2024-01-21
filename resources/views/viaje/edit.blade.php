@extends('layoutsBusiness.app')

@section('template_title')
    {{ __('Update') }} Viaje
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizando viaje</span>
                    </div>
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-success" style="color:#FF0000;background:#FFA9A9;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('viajes.update',['viaje' => $viaje->id_viaje]) }}"
                        role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('viaje.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
