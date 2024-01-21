<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\SelectviajeChangedEvent;
use App\Models\Reserva;
use App\Models\Viaje;
use App\Models\Rutum;
use App\Models\Bus;

class ReservaController extends Controller
{
    public function confirmacion($id_viaje, $id_bus, Request $informacion_asientos)
    {
        $capacidad = Bus::find($id_bus)->capacidad;
        $viaje = Viaje::where('id_viaje',$id_viaje)->paginate();
        $fecha_inicio = $viaje[0]['fecha_inicio'];
        $fecha_retorno = $viaje[0]['fecha_retorno'];
        $ruta = Rutum::where('id_ruta',$viaje[0]['id_ruta'])->paginate();
        $origen = $ruta[0]['origen'];
        $destino = $ruta[0]['destino'];
        return view('confirmarreserva', compact('id_viaje','id_bus','capacidad','informacion_asientos',
                                                'fecha_inicio','fecha_retorno',
                                                'origen','destino'));
    }
    
    public function reservar($id_viaje, $id_bus, Request $informacion_asientos)
    {
        $i = 0;
        $bus = Bus::find($id_bus);
        $asientos =  json_decode($bus->asientos);
        $capacidad = $bus->capacidad;
        $reservaciones = array();
        $j = 0;
        while($i < $capacidad){
            if($informacion_asientos['asiento'.strval($i+1)] == "1"){
                $asientos[$i] = '0';
                $reservaciones[] = $i+1;
                ++$j;
            }
            ++$i;
        }
        $bus->update(['asientos' => chr(34).$asientos.chr(34)]);
        for ($k = 0; $k < $j; $k++){
            Reserva::create([
                'id_cliente' => Auth::id(),
                'num_asiento' => $reservaciones[$k],
                'id_viaje' => $id_viaje,
                'id_bus' => $id_bus
            ]);
        }
        event(new SelectviajeChangedEvent($id_bus, $asientos));
        return redirect()->route('home');
    }

    protected function obtener_reservas(){
        return Reserva::select('buses.id_bus','buses.num_bus',
                'reserva.num_asiento','ruta.origen','ruta.destino',
                'viajes.fecha_inicio','viajes.fecha_retorno')
                ->join('buses','buses.id_bus','=','reserva.id_bus')
                ->join('viajes','viajes.id_viaje','=','reserva.id_viaje')
                ->join('ruta','ruta.id_ruta','=','viajes.id_ruta')
                ->where('reserva.id_cliente',Auth::id());
    }

    public function buscar_reservas(Request $requisitos)
    {
        $datos = $this->obtener_reservas();
        if($requisitos['origen'] != ''){
            $datos = $datos->where('ruta.origen',$requisitos['origen']);
        }
        if($requisitos['destino']!=''){
            $datos = $datos->where('ruta.destino',$requisitos['destino']);
        }
        if($requisitos['fecha_inicio']!=''){
            $datos = $datos->where('viajes.fecha_inicio',$requisitos['fecha_inicio']);
        }
        if($requisitos['fecha_retorno']!=''){
            $datos = $datos->where('viajes.fecha_retorno',$requisitos['fecha_retorno']);
        }
        $datos = $datos->paginate();
        return view('reserva.index',compact('datos'));
    }

    public function cancelar($id_bus, $num_asiento){
        Reserva::where('id_cliente',Auth::id())
            ->where('reserva.id_bus',$id_bus)
            ->where('reserva.num_asiento',$num_asiento)
            ->delete();
        $bus = Bus::find($id_bus);
        $asientos =  json_decode($bus->asientos);
        $asientos[(int)$num_asiento-1] = '1';
        $bus->update(['asientos' => chr(34).$asientos.chr(34)]);
        event(new SelectviajeChangedEvent($id_bus,$asientos));
        return redirect()->route('administrarreservas');
    }

    public function index()
    {
        $datos = $this->obtener_reservas();
        $datos = $datos->paginate();
        return view('reserva.index',compact('datos'));
    }
}
