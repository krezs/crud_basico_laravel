<?php

namespace App\Http\Controllers;

use App\Entrenador;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarEntrenadorRequest;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenadores=Entrenador::all(); // se obtienen todos los "entrenadores"
        return view('entrenador.index', compact('entrenadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenador.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarEntrenadorRequest $request)
    {

        if ($request->hasFile('avatar')) {
            $archivo=$request->file('avatar');
            $nombre_archivo=time().'_'.$archivo->getClientOriginalName();
            $archivo->move(public_path().'/images/',$nombre_archivo);
        }
        
        $slug = str_slug($request->input('nombre'), '-');

        $entrenador = new Entrenador();
        $entrenador->nombre=$request->input('nombre');
        $entrenador->descripcion=$request->input('descripcion');
        $entrenador->avatar=$nombre_archivo;
        $entrenador->slug=$slug;
        $entrenador->save();

        //return 'guardado';
        return redirect()->route('entrenadores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

     $entrenador=Entrenador::where('slug','=',$slug)->firstOrFail();
     return view('entrenador.mostrar',compact('entrenador'));
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $entrenador=Entrenador::where('slug','=',$slug)->firstOrFail();
        return view('entrenador.editar',compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $entrenador=Entrenador::where('slug','=',$slug)->firstOrFail();
        $entrenador->fill($request->except('avatar'));
        if ($request->hasFile('avatar')) {
            $archivo=$request->file('avatar');
            $nombre_archivo=time().'_'.$archivo->getClientOriginalName();
            $entrenador->avatar=$nombre_archivo;
            $archivo->move(public_path().'/images/',$nombre_archivo);
        }
        $entrenador->slug=str_slug($request->input('nombre'), '-');
        $entrenador->save();
        return redirect()->route('entrenadores.show',$entrenador->slug)->with('status','El entrenador se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $entrenador=Entrenador::where('slug','=',$slug)->firstOrFail();
        $ruta_archivo=public_path().'/images/'.$entrenador->avatar;
        \File::delete($ruta_archivo);
        $entrenador->delete();
        return redirect()->route('entrenadores.index');
    }
}
