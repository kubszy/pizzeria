<?php

use Illuminate\Database\Seeder;

use App\Pizza;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $pizza = new Pizza();
        $pizza->name = 'Margherita';
        $pizza->description = 'ciasto, sos pomidorowy, ser, oregano';
        $pizza->price = '23.80';
        // $pizza->average_price = '20.30';
        // $pizza->small_price = '14.10';
        $pizza->photo_path = 'images/Margherita.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Capriciosa';
        $pizza->description = 'ciasto, sos pomidorowy, ser, szynka, pieczarki, oregano';
        $pizza->price = '31.60';
        // $pizza->average_price = '27.00';
        // $pizza->small_price = '18.60';
        $pizza->photo_path = 'images/Capriciosa.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Parma';
        $pizza->description = 'ciasto, sos pomidorowy, ser mozzarella, szynka dojrzewająca, bazylia świeża, oregano';
        $pizza->price = '36.60';
        // $pizza->average_price = '31.10';
        // $pizza->small_price = '21.40';
        $pizza->photo_path = 'images/Parma.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Campione';
        $pizza->description = 'ciasto, sos pomidorowy, ser, szynka, kabanosy, boczek wędzony, salami, oregano';
        $pizza->price = '38.40';
        // $pizza->average_price = '32.60';
        // $pizza->small_price = '22.60';
        $pizza->photo_path = 'images/Campione.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Decoro';
        $pizza->description = 'ciasto, sos pomidorowy, ser, szynka, pieczarki, papryka konserwowa, czosnek, oregano';
        $pizza->price = '42.40';
        // $pizza->average_price = '32.60';
        // $pizza->small_price = '22.60';
        $pizza->photo_path = 'images/Decoro.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Pepe Roso';
        $pizza->description = 'ciasto, sos pomidorowy, ser, salami, papryka konserwowa, oregano';
        $pizza->price = '45.40';
        // $pizza->average_price = '30.80';
        // $pizza->small_price = '24.70';
        $pizza->photo_path = 'images/PepeRoso.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Napoletana';
        $pizza->description = 'ciasto, sos pomidorowy, ser, salami, oliwki zielone, papryczki jalapenos, oregano';
        $pizza->price = '47.43';
        // $pizza->average_price = '42.30';
        // $pizza->small_price = '32.60';
        $pizza->photo_path = 'images/Napoletana.png';
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = 'Piacere';
        $pizza->description = ' ciasto, ser, sos pomidorowy, salami, boczek wędzony, cebula biała, kukurydza, oregano';
        $pizza->price = '48.40';
        // $pizza->average_price = '36.40';
        // $pizza->small_price = '29.70';
        $pizza->photo_path = 'images/Piacere.png';
        $pizza->save();
    }
}
