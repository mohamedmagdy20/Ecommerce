<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name',255);
            $table->string('description',255);
            $table->string('img',255);
            $table->double('priceIn');
            $table->double('priceOut');
            $table->integer('stock');
            $table->integer('categories_id');
            $table->foreign('categories_id')->unsigned()->references('id')->on('categories')->onDelete('cascade');
            $table->integer('suppliers_id');
            $table->foreign('suppliers_id')->unsigned()->references('id')->on('suppliers')->onDelete('cascade');
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
}
