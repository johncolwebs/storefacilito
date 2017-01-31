@extends('layouts.app')

@section('content')
  <header class="big-padding text-center blue-grey white-text">
    <h1>Compra completada</h1>
  </header>
  <div class="container">
    <div class="card large-padding">
      <h3>Tu pago fue procesado <span class="{{ $order->status }}">{{ $order->status }}</span></h3>
      <p>Confima los detalles de tu envío:</p>
      <div class="row">
        <div class="col-xs-6">Correo electrónico</div>
        <div class="col-xs-6">{{ $order->email }}</div>
      </div>
      <div class="row">
        <div class="col-xs-6">Dirección</div>
        <div class="col-xs-6">{{ $order->address() }}</div>
      </div>
      <div class="row">
        <div class="col-xs-6">Código Postal</div>
        <div class="col-xs-6">{{ $order->postal_code }}</div>
      </div>
      <div class="row">
        <div class="col-xs-6">Estado y País</div>
        <div class="col-xs-6">{{ "$order->state $order->country_code" }}</div>
      </div>
      <div class="text-center top-space">
        <a href="{{ route('compras.show', $shopping_cart->customid) }}">Link Permanente de tu compra</a>
      </div>


    </div>
  </div>
@endsection