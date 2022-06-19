<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::where('email', auth()->user()->email)->get();
        return view('cuentaUsuario.cuenta')->with(['usuario'=>$usuario[0]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cuentum)
    {
        $notificacion = "Usuario modificado";

        $usuarioEditado = User::find($cuentum);
        $usuarioEditado->name = $request->name;
        $usuarioEditado->last_name = $request->last_name;
        $usuarioEditado->address = $request->address;

        if($request->password != '' && $request->newPassword != ''){
            if(Hash::check($request->password , $usuarioEditado->password)){
                $usuarioEditado->password = bcrypt($request->newPassword);
            }else{
                $notificacion = "Contraseñas no coinciden";
            }
        }
        
        $usuarioEditado->save();

        return view('inicio')->with(['usuarioEditado'=>$notificacion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
