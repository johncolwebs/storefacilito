<?php

namespace App;

/**
*
*/
class PayPal
{
  private $_apiContext;
  private $shopping_cart;
  private $_ClientId = 'ASx-XKcqK_1AzVIG6NFyJt1k2laxBNHCGnsKNSjuyzqIwlfGkkmmU75B0BfCPW-BRBJFKnmd-OInoDff';
  private $_ClientSecret = 'EFMo9svItZFKnQcXg2_ZQR4r778scIwkUajfUZS8-dILEMfxEScsOxCopTANsYX6LGSnpYMOAmf6OueJ';

  public function __construct($shopping_cart)
  {
    $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

    $config = config('paypal_payment');
    $flatConfig = array_dot($config);

    $this->_apiContext->setConfig($flatConfig);

    $this->shopping_cart = $shopping_cart;
  }

  public function generate()
  {
    $payment = \PaypalPayment::payment()->setIntent('sale')
                                        ->setPayer($this->payer())
                                        ->setTransactions([$this->transactions()])
                                        ->setRedirectUrls($this->redirectURLs());

    try
    {
      $payment->create($this->_apiContext);
    }
    catch (\Exception $ex)
    {
      dd($ex);
      exit(1);
    }

    return $payment;
  }

  public function payer()
  {
    # Return payment's info  // paypal OR credit_card
    return \PaypalPayment::payer()->setPaymentMethod('paypal');
  }

  public function redirectURLs()
  {
    # Return redirect Url's
    // $baseURL = url();
    return \PaypalPayment::redirectUrls()
                            ->setReturnUrl(route('payments.store'))
                            ->setCancelUrl(route('carrito'));
  }

  public function transactions()
  {
    # Return transactions's info
    return \PaypalPayment::transaction()
                            ->setAmount($this->amount())
                            ->setItemList($this->items())
                            ->setDescription("Tu Compra en MiCursoDigital")
                            ->setInvoiceNumber(uniqid()); // o tambien podemos usar el ID del carrito de compras
  }

  public function items()
  {
    $items = [];

    $products = $this->shopping_cart->products()->get();

    foreach ($products as $product) {
      array_push($items, $product->paypalItem());
    }

    return \PaypalPayment::itemList()
                                    ->setItems($items);
  }

  public function amount()
  {
    return \PaypalPayment::amount()
                                  ->setCurrency('USD')
                                  ->setTotal($this->shopping_cart->total()); // recalcular este valor en base al costo de envío físico
                                  //->setDetails($details);
  }

  /*
  * Aqui tenemos que crear los métodos faltantes para los envío físicos y los detalles
  */
  // public function details()
  // {
  //   return \PaypalPayment::details()
  //                                   ->setShipping('1.2')
  //                                   //total of items prices
  //                                   ->setSubtotal('17.5');
  // }

  public function execute($paymentId, $payerId)
  {
    $payment = \PaypalPayment::getById($paymentId, $this->_apiContext);

    $execution = \PaypalPayment::PaymentExecution()->setPayerId($payerId);

    return $payment->execute($execution, $this->_apiContext);
  }

}