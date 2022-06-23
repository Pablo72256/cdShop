@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

    @if (auth()->user())
        @if (auth()->user()->type === 'admin')
            <div class="d-flex justify-content-between m-2">
                <h1>Inventario de Articulos</h1>
                <a href="{{ route('inventario.create') }}" class="btn btn-secondary btn-lg">Nuevo artículo</a>
            </div>

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
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventario as $articulo)
                            <tr>
                                <td class="h5 pt-5">
                                    <div class="d-flex justify-content-center"><strong>{{ $articulo->id }}</strong></div>
                                </td>
                                <td><?php echo "<img src='$articulo->foto' alt='Caratula'/>" ?></td>
                                <td class="h5 pt-5">{{ $articulo->nombre }}</td>
                                <td class="h5 pt-5">{{ $articulo->artista }}</td>
                                <td class="text-nowrap h5 pt-5">{{ $articulo->categoria }}</td>
                                <td class="text-nowrap h5 pt-5">{{ $articulo->precio }}</td>
                                <td class="text-nowrap h5 pt-5">{{ $articulo->stock }}</td>
                                <td class="h5 pt-5">
                                    <a class="text-decoration-none" href="{{ route('inventario.edit', ['inventario'=>$articulo->id]) }}">
                                        <span class="material-icons text-primary">edit</span>
                                    </a>
                                    &nbsp;
                                    <a href="#deleteModal{{$articulo->id}}" data-bs-toggle="modal">
                                        <span class="material-icons text-danger">delete</span>
                                    </a>
                                </td>
                            </tr>
    
                            {{-- Delete Warning Modal --}}
                            <div class="modal fade" id="deleteModal{{$articulo->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar Artículo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Se va a eliminar el artículo <b>{{ $articulo->nombre }}</b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                                            {{-- Delete Confirm Form --}}
                                            <form action="{{ route('inventario.destroy', ['inventario'=>$articulo->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
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
        @else

            <h1>Ups! Algo ha ocurrido :&#40;</h1>
            <h2>Parece que la ruta a la que has intentado acceder, no ha sido encontrada.</h2>
            <br/>
            <a href="{{ url('/articulos') }}" class="btn btn-dark">Catálogo de CD´s</a>

        @endif



    @endif
@endsection
