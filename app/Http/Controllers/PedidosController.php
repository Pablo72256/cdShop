<?php

namespace App\Http\Controllers;
use App\Models\Compra;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PedidosController extends Controller
{
    public function mostrarPedidos()
    {
        $pedidos = Compra::where('status', 2)->where('usuario', auth()->user()->email)->orderBy('created_at', 'desc')->get();
        return view('pedidos.pedidos')->with(['pedidos'=>$pedidos]);
    }

    public function albaran(Request $request)
    {    
        $pedidos = Compra::where('id', $request->articulo)->get();

        foreach ($pedidos as $pedido){
            $extraerPedido = explode('&', $pedido['pedido']);
            $pedidoTotal = count($extraerPedido)-1;
            for($i=0; $i<$pedidoTotal; $i++){
                $extraerPedido[$i] = explode(',', $extraerPedido[$i]);
            }
            $fechaOriginal = $pedido->created_at;
            $totalPago = $pedido->total;
            $fechaNuevoFormato = date("d/m/Y", strtotime($fechaOriginal));
            $textoHTML = "";
            for($i = 0; $i < count($extraerPedido)-1; $i++){
                $textoHTML .= "<tr>";
                    $textoHTML .= "<td> ".$extraerPedido[$i][1]."</td>";
                    $textoHTML .= "<td> ".$extraerPedido[$i][2]."</td>";
                    $textoHTML .= "<td> ".$extraerPedido[$i][3]."</td>";
                    $textoHTML .= "<td> ".$extraerPedido[$i][4]."</td>";
                $textoHTML .= "</tr>";
            }
            
        }
            

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML("
            <title>CDShop Albaran</title>
            <table style='width: 100%;'>
                <tr>
                    <td>
                        <b>CDShop S.L</b> <br/> 
                        Calle Carmen, 8-10 <br/> 
                        24001 León <br/> 
                        Telf: 987 45 63 21 <br/> 
                        cdShop@gmail.com <br/> 
                        NIF: 72738874
                    </td>
                    <td style='text-align: right;'>
                        ".$fechaNuevoFormato."
                        <br/><br/> <br/> <br/> <br/> 
                    </td>
                </tr>
            </table>
                
            </div>
            <h1 style='text-align: center;'>Albarán</h1>
            <hr/>
            <h3 class='text-start'>Número de albarán AL-5687456-1445</h3>
            <hr/>
            <table style='border: 1px solid black; width: 100%; margin-top: 40px'>
                <tr>
                    <td>
                        <b>Sociedad Limitada S.L</b> <br/> 
                        Calle varillas, sn <br/> 
                        328017 Madrid <br/> 
                        Telf: 911 456 123 <br/> 
                        asesoriaonline@gmail.com <br/> 
                        NIF: 76778899
                    </td>
                </tr>
            </table>
            <br/>
            <hr/>
            <table style='width: 100%; margin-top: 40px; margin-bottom: 20px'>
                <tr style='margin-top: 20px'>
                    <th style='text-align: left;'>Titulo</th>
                    <th style='text-align: left;'>Artista</th>
                    <th style='text-align: left;'>Precio</th>
                    <th style='text-align: left;'>Cantidad</th>
                </tr>
                <br/>
                $textoHTML
            </table>
            <br/>
            <hr/>
            <h2 style='text-align: right'>Total: $totalPago €</h2>
            <h4 style='text-align: right'>I.V.A incl.</h4>
            <footer style='position: absolute; bottom: 0;'>
                <p>Para acreditar la validez del presente albarán deberá llevar el sello de la empresa receptora o en su defecto ser firmado por el responsable de la misma.</p>
            </footer>
        ");
        return $pdf->stream();
    }
}
