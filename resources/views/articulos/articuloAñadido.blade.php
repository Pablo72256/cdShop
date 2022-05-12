@extends('layouts.app')

@section('sesiones')
    <?php
        session_start();
        if (!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }
        $total = count($_SESSION['carrito']);
        $añadido = false;
        if($total > 0){
            for ($i=0; $i < $total; $i++) {
                if($articulo->id == ($_SESSION['carrito'][$i]['id'])){
                    $_SESSION['carrito'][$i]['cantidad'] += 1;
                    $añadido = true;
                }
            }
            if($añadido == false){
                $_SESSION['carrito'][] = array(
                    'id' => $articulo->id,
                    'titulo' => $articulo->titulo,
                    'autor' => $articulo->autor,
                    'precio' => $articulo->precio,
                    'cantidad' => 1
                );
            }

        }else{
            $_SESSION['carrito'][] = array(
                'id' => $articulo->id,
                'titulo' => $articulo->titulo,
                'autor' => $articulo->autor,
                'precio' => $articulo->precio,
                'cantidad' => 1
            );
        }

    ?>
@endsection

@section('content')

    <h2>Articulo: {{ $articulo->titulo }} se ha añadido al carrito</h2>
    <hr/>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ID: </strong>
        </div>
        <div class="col-sm-10"> {{ $articulo->id }}</div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">TITULO: </strong>
        </div>
        <div class="col-sm-10"> {{ $articulo->titulo }} </div>
    </div> <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">AUTOR: </strong>
        </div>
        <div class="col-sm-10"> {{ $articulo->autor }} </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">PRECIO: </strong>
        </div>
        <div class="col-sm-10"> @priceformat($articulo->precio) </div>
    </div>
    <hr/>
    <h2>
        <a class="btn btn-primary" href="{{ route('articulos.index') }}">Volver al catálogo</a>
        <a class="btn btn-secondary" href="{{ route('carrito') }}">Ir al carrito</a>
    </h2>
@endsection
