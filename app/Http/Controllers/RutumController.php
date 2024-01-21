<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Rutum;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class RutumController
 * @package App\Http\Controllers
 */
class RutumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruta = Rutum::where('ruta.encargado',Auth::id())
                ->paginate();

        return view('rutum.index', compact('ruta'))
            ->with('i', (request()->input('page', 1) - 1) * $ruta->perPage());
    }

    public function existencia(string $origen, string $destino){
        return Rutum::select()->where('origen',$origen)
        ->where('destino',$destino)
        ->where('encargado',Auth::id())
        ->count();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutum = new Rutum();
        return view('rutum.create', compact('rutum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Rutum::$rules);
        $request['encargado'] = Auth::id();
        if($this->existencia($request['origen'],$request['destino'])){
            return redirect()->route('ruta.create')
                ->with('fail', 'Error, dicha ruta ya existe.');
        }
        else{
            Rutum::create($request->all());
            return redirect()->route('ruta.index')
                ->with('success', 'Ruta creada con éxito.');
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
        $rutum = Rutum::find($id);

        return view('rutum.show', compact('rutum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutum = Rutum::find($id);

        return view('rutum.edit', compact('rutum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rutum $rutum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutum $rutum)
    {
        $request->validate(Rutum::$rules);
        if($this->existencia($request['origen'],$request['destino'])){
            return redirect()->route('ruta.edit',$rutum['id_ruta'])
                ->with('fail', 'Error, dicha ruta ya existe.');
        }
        else{
            $rutum->update($request->all());
            return redirect()->route('ruta.index')
                ->with('success', 'Ruta actualizada con éxito');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $viajesruta = Viaje::where('id_ruta',$id);
        if($viajesruta->count() > 0){
            return redirect()->route('ruta.index')
            ->with('fail', 'Se requieren eliminar algunos viajes antes ('.strval($viajesruta->count()).')');
        }
        Rutum::find($id)->delete();
        
        return redirect()->route('ruta.index')
            ->with('success', 'Ruta eliminada con éxito');
    }
}
