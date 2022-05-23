@extends('layouts.app')

@section('sesiones')
    <?php
        if(!isset($_SESSION)) {
            session_start();
        }
    ?>
@endsection

@section('content')

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pedido realizado correctamente</strong>, en breves recibiras el paquete a la direccion de envio que figura en tu cuenta.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <h1>Pedido listo!</h1>
    <hr/>
    <div class='container-fluid'>
        <h2>El pedido se ha realizado correctamente</h2>
        <br/>
        <h2> <a class="btn btn-outline-primary" href="{{ url('/articulos') }}">Volver al catálogo</a> </h2>
    </div>

    <?php
        //print_r($_SESSION['carrito'])
        $_SESSION['carrito'] = array();
        session_destroy();
    ?>

@endsection
