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
            $table->string('user_email',255);
            $table->string('name',255);
            $table->string('address',255);
            $table->string('state',255);
            $table->string('city',255);
            $table->string('country',255);
            $table->string('pincode',255);
            $table->string('mobile',255);
            $table->float('shipping_charges');
            $table->string('coupon_code',255);
            $table->float('coupon_amount');
            $table->string('order_status',255);
            $table->string('payment_method',255);
            $table->float('grand_total');
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
