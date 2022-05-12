@extends('layouts.app')

@section('sesiones')
    <?php
        session_start();
    ?>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

    @if (isset($_REQUEST['comprar']))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pedido realizado correctamente</strong>, en breves recibiras el paquete a la direccion de envio que figura en tu cuenta.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            $_SESSION['carrito'] = array();
            session_destroy();
        ?>

    @endif

    <h1>Catálogo de Articulos</h1>
    <table id="tablaArticulos" class="table table-striped">
        <thead class='bg-secondary text-white'>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Artista</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td class="h5 pt-5">
                        <div class="d-flex justify-content-center"><strong>{{ $articulo->id }}</strong></div>
                    </td>
                    <td><img src="<?php $ruta = "img/articulos/{$articulo->foto}.png"; echo $ruta; ?>" alt="caratula"></td>
                    <td class="h5 pt-5">{{ $articulo->nombre }}</td>
                    <td class="h5 pt-5">{{ $articulo->artista }}</td>
                    <td class="text-nowrap h5 pt-5">{{ $articulo->precio }}</td>
                    <td class="text-nowrap h5 pt-5">{{ $articulo->categoria }}</td>
                    <td class="text-nowrap h5 pt-5">{{ $articulo->stock }}</td>
                    <td class="h5 pt-5">
                        <form action="{{ route('articulos.show', ['articulo'=>$articulo])}}" method="GET">
                            <button type="submit" class="btn btn-outline-success" name="añadirArticulo">Añadir al carrito</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tablaArticulos').DataTable();
            } );
        </script>
    @endsection

@endsection
