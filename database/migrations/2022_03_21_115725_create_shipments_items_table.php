<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments_items', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('shipments_id');
            $table->foreign('shipments_id')->unsigned()->references('id')->on('shipments')->onDelete('cascade');
            $table->integer('products_id');
            $table->foreign('products_id')->unsigned()->references('id')->on('products')->onDelete('cascade'); 
            $table->integer('quantity');
            $table->double('price_per_one');
            $table->double('total');
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
        Schema::dropIfExists('shipments_items');
    }
}
