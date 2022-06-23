<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        $articulos = Articulo::all();
        return view('inicio')->with(['articulos'=>$articulos]);
    }
    public function nosotros()
    {
        return view('nosotros');
    }
    public function contacto()
    {
        return view('contacto');
    }
    public function crearAdmin()
    {
        return view('crearAdmin');
    }
}
