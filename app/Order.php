<?php

namespace App;

use App\User;

use App\OrderPizza;

use App\OrderTopping;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function orderPizza()
  {
    return $this->hasMany(OrderPizza::class);
  }

  public function orderTopping()
  {
    return $this->hasMany(OrderTopping::class);
  }
}
