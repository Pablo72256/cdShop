<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }
    public function nosotros()
    {
        return view('nosotros');
    }
    public function contacto()
    {
        return view('contacto');
    }
}
