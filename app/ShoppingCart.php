<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
  protected $fillable = ['status'];

  public function approve()
  {
    $this->updateCustomIdAndStatus();
  }

  public function generateCustomID()
  {
    return md5("$this->id $this->update_at");
  }

  public function updateCustomIdAndStatus()
  {
    $this->status = 'approved';
    $this->customid = $this->generateCustomID();

    $this->save();
  }

  public function inShoppingCarts()
  {
    return $this->hasMany('App\InShoppingCart');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product', 'in_shopping_carts');
  }

  public function order()
  {
    return $this->hasOne('App\Order')->first();
  }

  public function productsSize()
  {
    # Devuelve cuantos productos hay en el carrito de compras
    return $this->products()->count();
  }

  public function total()
  {
    # Devuelve el valor total a pagar en el carrito
    return $this->products()->sum('pricing');
  }

  /*
  * crear un método para convertir de pesos a Dolares
  */
  // public function totalUSD()
  // {
  //   return $this->total() * 00000;
  // }

  public static function findOrCreateBySessionID($shopping_cart_id)
  {
    if ($shopping_cart_id)
      # Buscamos el carrito de compras con ese ID
      return ShoppingCart::findBySession($shopping_cart_id);
    else
      # Creamos el carrito de compras
      return ShoppingCart::createWithoutSession();
  }

  public static function findBySession($shopping_cart_id)
  {
    return ShoppingCart::find($shopping_cart_id);
  }

  public static function createWithoutSession()
  {
    return ShoppingCart::create([
      "status" => "incomplete"
      ]);
  }
}
