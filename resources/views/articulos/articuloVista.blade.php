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

    <h1 class="text-center">Catálogo de Articulos</h1>
    <hr/>
    <div class="table-responsive">
        <table id="tablaArticulos" class="table table-striped">
            <thead class='bg-secondary text-white'>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Artista</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 1;?>
                @foreach ($articulos as $articulo)
                    <tr>
                        <td class="h5 pt-5">
                            <div class="d-flex justify-content-center"><strong>{{ $contador }}</strong></div>
                        </td>
                        <td><?php echo "<img src='$articulo->foto' alt='Caratula'/>" ?></td>
                        <td class="h5 pt-5">{{ $articulo->nombre }}</td>
                        <td class="h5 pt-5">{{ $articulo->artista }}</td>
                        <td class="text-nowrap h5 pt-5">{{ $articulo->categoria }}</td>
                        <td class="text-nowrap h5 pt-5">{{ $articulo->precio }}$</td>
                        <td class="h5 pt-5">
                            @if ($articulo->stock < 1)
                                Sin stock
                            @else
                                <form action="{{ route('articulos.show', ['articulo'=>$articulo])}}" method="GET">
                                    <button type="submit" class="btn btn-outline-success" name="añadirArticulo">Añadir al carrito</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <?php $contador++;?>
                @endforeach
            </tbody>
        </table>
    </div>

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
