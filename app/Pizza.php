<?php

namespace App;

use App\OrderPizza;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
  public function orderPizza()
  {
    return $this->hasMany(OrderPizza::class);
  }
}
