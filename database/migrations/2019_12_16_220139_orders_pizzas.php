<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersPizzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders_pizzas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          $table->bigInteger('pizza_id')->unsigned();
          $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
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
