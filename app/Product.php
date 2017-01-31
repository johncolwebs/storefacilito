<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function scopeLatest($query)
  {
    return $query->orderBy('id', 'desc');
  }

  public function paypalItem()
  {
    return \PayPalPayment::item()
                                ->setName($this->title)
                                ->setDescription($this->description)
                                ->setCurrency('USD')
                                ->setQuantity(1) //modificar para poder llevar varios artículos
                                ->setPrice($this->pricing);
  }
}
