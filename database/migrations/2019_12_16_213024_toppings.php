<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Toppings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('toppings', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name')->unique();
          $table->text('description')->nullable();
          $table->boolean('status')->default(1);
          $table->decimal('price', 8, 2);
          $table->string('type');
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
