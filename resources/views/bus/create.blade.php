@extends('layoutsBusiness.app')

@section('template_title')
    Registrando bus
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Registrando bus</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buses.store') }}"
                        role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bus.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
