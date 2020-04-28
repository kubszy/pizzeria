<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pizzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pizzas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name')->unique();
          $table->text('description');
          $table->boolean('status')->default(1);
          $table->decimal('price', 8, 2);
          // $table->decimal('average_price', 8, 2);
          // $table->decimal('small_price', 8, 2);
          $table->string('photo_path');
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
