<?php

namespace App;

use App\OrderTopping;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
  public function orderTopping()
  {
    return $this->hasMany(OrderTopping::class);
  }
}
