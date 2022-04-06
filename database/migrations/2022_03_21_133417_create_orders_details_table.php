<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('quantity');
            $table->integer('product_id');
            $table->foreign('product_id')->unsigned()->references('id')->on('products')->onDelete('cascade');
            $table->integer('order_id');
            $table->foreign('order_id')->unsigned()->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('orders_details');
    }
}
