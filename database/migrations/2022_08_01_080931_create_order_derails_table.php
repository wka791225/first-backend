<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_derails', function (Blueprint $table) {
            $table->id();

			  $table->string('order_id')->comment('訂單ID')->nullable();
              $table->string('product_id')->comment('商品ID')->nullable();
              $table->string('qty')->comment('數量')->nullable();
              $table->string('price')->comment('單價')->nullable();

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
        Schema::dropIfExists('order_derails');
    }
};
