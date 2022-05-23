@extends('layouts.app')

@section('sesiones')
    <?php
        session_start();
        if (!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }
        if (isset($_REQUEST['modificarArticulo'])){
            $cantidad = $_REQUEST['cantidadNueva'];
            $articuloUpdate = $_REQUEST['articuloModificado'];

            $_SESSION['carrito'][$articuloUpdate]['cantidad'] = $cantidad;

        }
        $total = 0;
        $totalArticulos = 0;
        foreach ($_SESSION['carrito'] as $valor) {
            $total += $valor['precio'] * $valor['cantidad'];
            $totalArticulos += $valor['cantidad'];
        }

    ?>
@endsection

@section('content')

    <h1 class="text-center">Carrito de compras</h1>
    <hr/>

    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <p class="text-muted lead">Actualmente tienes <?php echo $totalArticulos;?> productos en tu carrito de compra.</p>
                </div>

                <div class="col-md-10 clearfix" id="basket">
                    <div class="box">

                        <form method="post" action="#">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="text-white bg-secondary">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Artista</th>
                                            <th>Categoria</th>
                                            <th class='text-center'>Precio unidad</th>
                                            <th class='text-center'>Cantidad</th>
                                            <th class='text-center'>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(count($_SESSION['carrito']) > 0)

                                            @for($i = 0; $i < count($_SESSION['carrito']); $i++)

                                                <tr>
                                                    <td class='pt-3'>{{$_SESSION['carrito'][$i]['nombre'] }}</td>
                                                    <td class='pt-3'>{{$_SESSION['carrito'][$i]['artista'] }}</td>
                                                    <td class='pt-3'>{{$_SESSION['carrito'][$i]['categoria'] }}</td>
                                                    <td class='text-center pt-3'>{{$_SESSION['carrito'][$i]['precio'] }}€</td>


                                                    <td class='text-center pt-3'>
                                                        <form action='{{ route('carrito')}}' method='GET'>@method('GET')
                                                            <input type='number' class="w-50" min="1" max="100" value="{{ $_SESSION['carrito'][$i]['cantidad'] }}" name="cantidadNueva"/>
                                                            <input name="articuloModificado" type="hidden" value="{{ $i }}">
                                                    </td>
                                                    <td class='d-flex justify-content-center'>

                                                        <button type='submit' class='btn ' name='modificarArticulo'><span class='material-icons text-warning'>sync</span></button></form>

                                                        <form action='{{ route('articulos.destroy', ['articulo'=>$i+1])}}' method='POST'>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type='submit' class='btn' name='eliminarArticulo'><span class='material-icons text-danger'>delete</span></button>
                                                        </form>

                                                    </td>
                                                </tr>

                                            @endfor
                                        @endif

                                    </tbody>

                                    <tfoot class="p-4">
                                    <?php
                                        if(count($_SESSION['carrito']) <= 0){
                                            echo "
                                                <tr>
                                                    <th colspan='5'>Total</th>
                                                    <th>0€</th>
                                                </tr>
                                            ";
                                        }else{
                                            echo "
                                                <tr>
                                                    <th colspan='5'><h4>Total</h4></th>
                                                    <th><h4>$total €</h4> </th>
                                                </tr>
                                            ";
                                        }
                                    ?>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="box">
                        <div class="box-header">
                            <h3>Resumen</h3>
                        </div>
                        <p class="text-muted">Envíos y tarifas son base, en todos los productos.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <th><h5><?php echo $total;?>€</h5></th>
                                    </tr>
                                    <tr>
                                        <td>Envio</td>
                                        <th><h5>0.00€</h5></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th><h5>
                                            <?php
                                                $total += 0.00;
                                                echo $total;
                                            ?>€
                                        </h5></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <?php
                                                if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0 ){
                                            ?>
                                                <a href="{{ url('/iniciar_compra') }}" class="btn btn-outline-success">Pagar</a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
