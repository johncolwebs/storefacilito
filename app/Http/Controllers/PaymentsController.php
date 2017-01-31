<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PayPal;
use App\ShoppingCart;
use App\Order;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shoppingcart');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart = $request->shopping_cart;

        $paypal = new PayPal($shopping_cart);
        $response = $paypal->execute($request->paymentId, $request->PayerID);
        // dd($response->payer);exit;

        if ($response->state == 'approved') {
            # Eliminamos la sesion del carrito
            \Session::remove('shopping_cart_id');
            # Si el pago fue aprovado, guardamos los detalles del pedido
            $order = Order::createFromPayPalResponse($response, $shopping_cart);
            $shopping_cart->approve();

            return view('shopping_carts.completed', ['shopping_cart' => $shopping_cart, 'order' => $order]);
        } else {
            # Si la respuesta del pago es 'canceled'///ALGO ASÍ, entonces debe mostrar un mensaje flash en la página con el error del pago no procesado
        }


        return view('shopping_carts.completed', ['shopping_cart' => $shopping_cart, 'order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
