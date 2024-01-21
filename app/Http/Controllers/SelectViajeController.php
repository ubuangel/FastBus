<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Viaje;
use App\Models\Rutum;
use Illuminate\Http\Request;

class SelectviajeController extends Controller
{
    public function seleccionarbus($id_viaje)
    {
        $bus = Bus::where('id_viaje',$id_viaje)->where('estado','1');
        if($bus->count() > 1){
            $buses = $bus->paginate();
            return view('seleccionarbus',compact('id_viaje','buses'));
        }
        else{
            $id_bus = ($bus->paginate())[0]['id_bus'];
            return redirect(route('elegirasientos', [$id_viaje,$id_bus]));
        }
    }

    public function elegirasientos($id_viaje,$id_bus)
    {
        $bus = Bus::find($id_bus);
        $viaje = Viaje::find($id_viaje);
        $fecha_inicio = $viaje->fecha_inicio;
        $fecha_retorno = $viaje->fecha_retorno;
        $ruta = Rutum::find($viaje->id_ruta);
        $origen = $ruta->origen;
        $destino = $ruta->destino;
        $id_bus = $bus->id_bus;
        $estados = json_decode($bus->asientos);
        $capacidad = $bus->capacidad;
        return view('elegirasientos',compact('estados','id_viaje',
                                        'capacidad','fecha_inicio',
                                        'fecha_retorno','origen',
                                        'destino','id_bus'));
    }

    public function confirmar($id_viaje, $id_bus, Request $informacion_asientos)
    {
        if($informacion_asientos['monto_input'] == "0"){
            return redirect(route('selectviaje',$id_viaje))
                ->with('fail','Seleccione al menos un asiento.');
        }
        $busselect = Bus::find($id_bus);
        $viaje = Viaje::where('id_viaje',$id_viaje)->paginate();
        $fecha_inicio = $viaje[0]['fecha_inicio'];
        $fecha_retorno = $viaje[0]['fecha_retorno'];
        $ruta = Rutum::where('id_ruta',$viaje[0]['id_ruta'])->paginate();
        $origen = $ruta[0]['origen'];
        $destino = $ruta[0]['destino'];
        $capacidad = $busselect['capacidad'];
        return view('confirmardatos',compact('id_viaje','id_bus','capacidad','informacion_asientos',
                                            'fecha_inicio','fecha_retorno',
                                            'origen','destino'));
    }
}