@extends('layoutsBusiness.app')

@section('template_title')
    Viaje
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Viaje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('viajes.create') }}"
                                class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('fail'))
                        <div class="alert alert-success" style="color:#FF0000;background:#FFA9A9;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
										<th>Fecha Inicio</th>
										<th>Fecha Retorno</th>
										<th>Estado</th>
										<th>Origen</th>
                                        <th>Destino</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viajes as $viaje)
                                    <tr>
                                        <td>{{ ++$i }}</td>
										<td>{{ $viaje->fecha_inicio }}</td>
										<td>{{ $viaje->fecha_retorno }}</td>
                                        <?php if($viaje->estado == '0') : ?>
										    <td>Sin buses asignados</td>
                                        <?php else : ?>
                                            <td>Con buses asignados</td>
                                        <?php endif; ?>
										<td>{{ $viaje->origen }}</td>
                                        <td>{{ $viaje->destino }}</td>
                                        <td>
                                            <form action="{{ route('viajes.destroy',['viaje' => $viaje->id_viaje]) }}"
                                            method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                href="{{ route('viajes.show',['viaje' => $viaje->id_viaje]) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                </a>
                                                <a class="btn btn-sm btn-success"
                                                href="{{ route('viajes.edit',['viaje' => $viaje->id_viaje]) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $viajes->links() !!}
            </div>
        </div>
    </div>
@endsection
