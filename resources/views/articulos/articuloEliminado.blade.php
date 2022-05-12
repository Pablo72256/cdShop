@extends('layouts.app')

@section('sesiones')
    <?php
        session_start();
        if (!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }
    ?>
@endsection

@section('content')

    <h2>Libro: <?php echo $_SESSION['carrito'][$articulo]['titulo'] ?> Se ha eliminado del carrito</h2>
    <hr/>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ID: </strong>
        </div>
        <div class="col-sm-10"> <?php echo $_SESSION['carrito'][$articulo]['id'] ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">TITULO: </strong>
        </div>
        <div class="col-sm-10"> <?php echo $_SESSION['carrito'][$articulo]['titulo'] ?> </div>
    </div> <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">AUTOR: </strong>
        </div>
        <div class="col-sm-10"> <?php echo $_SESSION['carrito'][$articulo]['autor'] ?> </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">PRECIO: </strong>
        </div>
        <div class="col-sm-10"> <?php echo $_SESSION['carrito'][$articulo]['precio']?> </div>
    </div>
    <hr/>
    <h2>
        <a class="btn btn-primary" href="{{ route('articulos.index') }}">Volver al catálogo</a>
        <a class="btn btn-secondary" href="{{ route('carrito') }}">Ir al carrito</a>
    </h2>

    <?php

        unset($_SESSION['carrito'][$articulo]);

        $_SESSION['carrito'] = array_values($_SESSION['carrito']);

    ?>
@endsection
