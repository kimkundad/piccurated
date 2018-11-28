<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->integer('user_id');
            $table->string('lname');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('coupon')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('zip_code');
            $table->string('country');
            $table->string('phone');
            $table->float('order_weight', 8, 2)->default('0');
            $table->float('shipping_price', 8, 2)->default('0');
            $table->float('total_money', 8, 2);
            $table->text('note')->nullable();
            $table->integer('discount')->default('0');
            $table->integer('order_status')->default('0');
            $table->integer('order_status_show')->default('0');
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
}
