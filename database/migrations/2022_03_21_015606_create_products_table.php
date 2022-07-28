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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); //商品名稱 nullable() 允許空值
            $table->string('describe')->nullable(); //描述
            $table->longText('img')->nullable();  //圖片的路徑
            $table->integer('price')->nullable();//價格
            $table->integer('amount')->nullable();//剩餘數量

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
        Schema::dropIfExists('products');
    }
};
