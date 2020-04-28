<?php

namespace App;

use App\Pizza;

use App\Order;

use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    protected $table = 'orders_pizzas';

    public function pizza()
    {
      return $this->belongsTo(Pizza::class);
    }


    public function order()
    {
      return $this->belongsTo(Order::class);
    }
}
