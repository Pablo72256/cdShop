<?php

namespace App\Http\Controllers;

session_start();

use App\Models\Compra;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{
    public function __construct()
    {
        $total = 0;
        if ( app()->environment('EnProduction') ) {
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key')
            );
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function iniciar_compra(Request $request){
        $hayStock = true;
        $articuloSinStock = "";

        foreach ($_SESSION['carrito'] as $carro) {
            $stock = Articulo::where('id', $carro['id'])->get();
            if($stock[0]->stock < $carro['cantidad']){
                $hayStock = false;
                $articuloSinStock = $carro['nombre'];
            }
        };

        if($hayStock){
            $total = 0;
            $pedido = '';
            foreach ($_SESSION['carrito'] as $valor) {
                $total += $valor['precio'] * $valor['cantidad'];
                $pedido = $pedido .implode(",", $valor).'&';
            };
            $totalRound = round($total , 2) * 1000;

            $nueva_compra = new Compra();
            $nueva_compra->session_id = 052022;
            $nueva_compra->total = $totalRound;
            $nueva_compra->usuario = auth()->user()->email;
            $nueva_compra->pedido = $pedido;
            $nueva_compra->save();
            $url_to_pay = self::start_web_pay_plys_transaction( $nueva_compra );
            return redirect($url_to_pay);
        }else{
            return view('carrito.faltaStock')->with(['errorStock'=>$articuloSinStock]);
        }
        
    }

    public function start_web_pay_plys_transaction( $nueva_compra ){
        $transaccion = (new Transaction)->create(
            $nueva_compra->id,
            $nueva_compra->session_id,
            $nueva_compra->total,
            route('confirmar_pago')
        );
        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        return $url;
    }

    public function confirmar_pago(Request $request){
        $confirmacion = (new Transaction)->commit( $request->get('token_ws') );

        $compra = Compra::where('id', $confirmacion->buyOrder)->first();

        if ( $confirmacion->isApproved() ){
            $total = 0;
            foreach ($_SESSION['carrito'] as $valor) {
                $total += $valor['precio'] * $valor['cantidad'];

                $articuloEditado = Articulo::find($valor['id']);
                $articuloEditado->stock -= $valor['cantidad'];
                $articuloEditado->save();
            };
            $compra->status = 2;
            $compra->total = $total;
            $compra->update();

            return view('pagos.aprobado');

        }else{
            return view('pagos.denegado');
        }
    }
}
