<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id'); 
            $table->integer('user_id'); 
            $table->integer('product_id'); 
            $table->string('product_code',255);
            $table->string('product_name',255);
            $table->string('product_price',255);
            $table->string('product_size',255);
            $table->string('product_color',255);
            $table->string('product_qty',255);
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
        Schema::dropIfExists('orders_products');
    }
}
