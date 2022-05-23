<?php

namespace App\Http\Controllers;

session_start();

use App\Models\Compra;
use Illuminate\Http\Request;
use Transbank\webpay\WebpayPlus;
use Transbank\webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{
    public function __construct()
    {
        if ( app()->environment('production') ) {
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key')
            );
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function iniciar_compra(Request $request){

        $total = 0;
        foreach ($_SESSION['carrito'] as $valor) {
            $total += $valor['precio'] * $valor['cantidad'];
        }
        $totalDolares = round($total * 1.06 , 3) * 1000;

        $nueva_compra = new Compra();
        $nueva_compra->session_id = 123456;
        $nueva_compra->total = $totalDolares;
        $nueva_compra->save();
        $url_to_pay = self::start_web_pay_plys_transaction( $nueva_compra );
        return redirect($url_to_pay);
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
            $compra->status = 2;
            $compra->update();

            return view('pagos.aprobado');

        }else{
            return view('pagos.denegado');
        }
    }
}
