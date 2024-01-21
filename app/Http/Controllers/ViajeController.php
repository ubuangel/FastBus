<?php

namespace App\Http\Controllers;

use App\Models\Rutum;
use App\Models\Bus;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class ViajeController
 * @package App\Http\Controllers
 */
class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::select('viajes.id_viaje','viajes.fecha_inicio',
                                'viajes.fecha_retorno','viajes.estado','ruta.origen','ruta.destino')
                ->join('ruta','ruta.id_ruta','=','viajes.id_ruta')
                ->where('ruta.encargado',Auth::id())
                ->paginate();
        return view('viaje.index', compact('viajes'))
            ->with('i', (request()->input('page', 1) - 1) * $viajes->perPage());
    }
    public function existencia(Request $request){
        return Viaje::where('fecha_inicio',$request['fecha_inicio'])
                ->where('fecha_retorno',$request['fecha_retorno'])
                ->where('viajes.id_ruta',$request['id_ruta'])
                ->join('ruta','ruta.id_ruta','=','viajes.id_ruta')
                ->where('ruta.encargado',Auth::id())
                ->count();
    }
    public function home()
    {
        $viajes = Viaje::all(); // Recupera todos los registros de la tabla Viaje

        return view('home', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viaje = new Viaje();
        $rutas = Rutum::where('encargado',Auth::id())->paginate();
        return view('viaje.create', compact('viaje','rutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['estado'] = '0';
        $request->validate(Viaje::$rules);
        if($this->existencia($request)){
            return redirect()->route('viajes.create')
                ->with('fail','Error, ya hay uno o más viajes exactamente igual.');
        }
        else{
            Viaje::create($request->all());
            return redirect()->route('viajes.index')
            ->with('success', 'Viaje creado con éxito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viaje = Viaje::join('ruta','ruta.id_ruta','=','viajes.id_ruta')->find($id);

        return view('viaje.show', compact('viaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viaje = Viaje::find($id);
        $rutas = Rutum::where('encargado',Auth::id())->get();
        return view('viaje.edit', compact('viaje','rutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Viaje $viaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viaje $viaje)
    {
        $request['estado'] = $viaje->estado;
        $request->validate(Viaje::$rules);
        if($this->existencia($request)){
            return redirect()->route('viajes.edit',$viaje['id_viaje'])
                ->with('fail', 'Error, ya hay un viaje exactamente igual');
        }
        else{
            $viaje->update($request->all());
            return redirect()->route('viajes.index')
                ->with('success', 'Viaje actualizado con éxito');
        }
    }
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $busesasignados = Bus::where('id_viaje',$id)->count();
        if($busesasignados){
            return redirect()->route('viajes.index')
            ->with('fail', 'Se requieren eliminar algunos buses antes ('.strval($busesasignados).')');
        }
        Viaje::find($id)->delete();
        return redirect()->route('viajes.index')
            ->with('success', 'Viaje eliminado con éxito');
    }

}
