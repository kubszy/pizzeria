<?php

namespace App;

use App\Topping;

use Illuminate\Database\Eloquent\Model;

class OrderTopping extends Model
{
    protected $table = 'orders_toppings';

    public function topping()
    {
      return $this->belongsTo(Topping::class);
    }

}
