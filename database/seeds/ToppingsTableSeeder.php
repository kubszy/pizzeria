<?php

use Illuminate\Database\Seeder;

use App\Topping;

class ToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $topping = new Topping();
      $topping->name = 'Sos Pomidorowy';
      $topping->price = '3';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Sos Czosnkowy';
      $topping->price = '3';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Sos Ostry';
      $topping->price = '3';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Sos Musztardowy-słodki';
      $topping->price = '3';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Sos Wiosenny';
      $topping->price = '3';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Dodatkowy Ser';
      $topping->price = '5.50';
      $topping->type = 'sos';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Ser Mozzarella';
      $topping->price = '5.50';
      $topping->type = 'składnik';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Szynka';
      $topping->price = '5';
      $topping->type = 'składnik';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Salami';
      $topping->price = '5';
      $topping->type = 'składnik';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Boczek';
      $topping->price = '6';
      $topping->type = 'składnik';
      $topping->save();

      $topping = new Topping();
      $topping->name = 'Papryczka Jalapenos';
      $topping->price = '4.50';
      $topping->type = 'składnik';
      $topping->save();
    }
}
