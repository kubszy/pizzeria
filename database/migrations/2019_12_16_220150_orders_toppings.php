<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersToppings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_toppings', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          $table->bigInteger('topping_id')->unsigned();
          $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('cascade');
          $table->decimal('price', 8, 2);
          $table->integer('quantity');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
