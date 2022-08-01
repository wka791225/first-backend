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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('使用者ID')->nullable();
            $table->string('address')->comment('地址')->nullable();
            $table->string('tel')->comment('電話')->nullable();
            $table->integer('total')->comment('總價')->nullable();
            $table->integer('fare')->comment('運費')->nullable();
            $table->integer('pay_method')->comment('付款方式')->nullable();//1:信用卡 2:網路ATM 3:超商代碼 4:貨到付款
            $table->integer('pay_status')->comment('付款狀態')->nullable();//1.未付款 2.已付款 3.已出貨 4.已取消
            $table->integer('transport')->comment('運送方式')->nullable();//1.黑貓宅配 2.超商店到店
            $table->string('order_number')->comment('寄送單號')->nullable(); //金流方紀錄的訂單編號
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
        Schema::dropIfExists('orders');
    }
};
