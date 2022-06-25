<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario = Articulo::all();
        return view ('inventario.inventarioVista')->with(['inventario' => $inventario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.articuloNuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = file_get_contents($request->form_foto);
        $base64 = 'data:image/jpg;base64,' . base64_encode($data);
        
        // echo "<img src='$base64'/>";
        
        
        Articulo::create([
            'foto' => $base64,
            'nombre' => $request->form_nombre,
            'artista' => $request->form_artista,
            'stock' => $request->form_stock,
            'categoria' => $request->form_categoria,
            'precio' => $request->form_precio,
        ]);

        return view('inventario.articuloGuardado')->with(['articulo'=>$request->form_nombre]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($respuesta)
    {

        $articulo = Articulo::where('id', $respuesta)->get();
        return view('inventario.articuloEditar')->with(['articulo'=>$articulo[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articulo)
    {
        if(!$request->form_foto){
            $base64 = $request->form_foto_old;
        }else{
            $data = file_get_contents($request->form_foto);
            $base64 = 'data:image/jpg;base64,' . base64_encode($data);
        }
        
        $articuloEditado = Articulo::find($articulo);
        $articuloEditado->foto = $base64;
        $articuloEditado->nombre = $request->nombre;
        $articuloEditado->artista = $request->artista;
        $articuloEditado->stock = $request->stock;
        $articuloEditado->categoria = $request->categoria;
        $articuloEditado->precio = $request->precio;

        $articuloEditado->save();

        return view('inventario.articuloModificado')->with([
            'articulo'=>$articuloEditado->nombre,
            'operacion'=>'actualizado',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($articulo)
    {
        $articuloEliminar = Articulo::find($articulo);
        $nombre = $articuloEliminar->nombre;
        $articuloEliminar->delete();

        return view('inventario.articuloModificado')->with([
            'articulo'=>$nombre,
            'operacion'=>'eliminado',
        ]);
    }
}
