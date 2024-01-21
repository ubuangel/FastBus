<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Rutum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function buscar_viajes_cliente(Request $requisitos){
        $datos = Rutum::select('ruta.origen','ruta.destino',
                'viajes.fecha_inicio','viajes.fecha_retorno',
                'viajes.id_viaje')
                ->join('viajes','ruta.id_ruta','=','viajes.id_ruta')
                ->where('viajes.estado',1);
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
        return view('home',compact('datos'))
        ->with('i', (request()->input('page', 1) - 1) *10);
    }
    /**
     * Show the application dashboard.
     *@return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Route::has('login')){
            $result = Business::firstwhere('id_usuario', Auth::id());
            if($result == null){
                $datos = Rutum::join('viajes','ruta.id_ruta','=','viajes.id_ruta');
                $datos = $datos->where('viajes.estado','1');
                $datos = $datos->paginate();
                return view('home', compact('datos'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
            }
            else{
                return view('homebusiness');
            }
        }
        else{
            return route('login');
        }
    }
}
