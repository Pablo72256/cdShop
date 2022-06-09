@extends('layouts.app')

@section('content')

    <h1 class="text-center">Listado de tus pedidos</h1>
    <hr/>
    @if (count($pedidos) > 0)
        <div class="row d-flex">
            <div class="col-10 mx-auto">
                @foreach ($pedidos as $pedido)
                <?php
                    $extraerPedido = explode('&', $pedido['pedido']);
                    $pedidoTotal = count($extraerPedido)-1;
                    for($i=0; $i<$pedidoTotal; $i++){
                        $extraerPedido[$i] = explode(',', $extraerPedido[$i]);
                    }
                    $fechaOriginal = $pedido->created_at;
                    $fechaNuevoFormato = date("d/m/Y", strtotime($fechaOriginal));
                ?>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Pedido del {{ $fechaNuevoFormato }}</h4>
                        </div>
                        <div>
                            <a href="{{ route('albaran', ['articulo'=>$pedido->id]) }}" class="btn btn-danger mb-2">Albarán PDF</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-5">
                            <thead class='bg-secondary text-white'>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Artista</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($extraerPedido)-1; $i++)
                                    <tr>
                                        <td class="h5">{{ $extraerPedido[$i][1] }}</td>
                                        <td class="h5">{{ $extraerPedido[$i][2] }}</td>
                                        <td class="text-nowrap h5">{{ $extraerPedido[$i][3] }}</td>
                                        <td class="text-nowrap h5">{{ $extraerPedido[$i][4] }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end"><h3>Total: {{ $pedido->total }}$</h3></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h2>Tovadía no tienes nigún pedido.</h2>
        <h3>Empieza por aquí</h3>
        <a href="{{ url('/articulos') }}" class="btn btn-outline-primary">Catálogo de CD´s</a>
    @endif

@endsection
