@extends('layouts.app')

@section('template_title')
    Modificando bus
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modificando bus</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buses.update', ['bus' => $bus->id_bus]) }}"
                        role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bus.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
