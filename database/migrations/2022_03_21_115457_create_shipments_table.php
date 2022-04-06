<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->text("shipment_items");
            $table->integer('admin_id');
            $table->foreign('admin_id')->unsigned()->references('id')->on('admins')->onDelete('cascade');
            $table->integer('supplier_id');
            $table->foreign('supplier_id')->unsigned()->references('id')->on('suppliers')->onDelete('cascade');
            $table->double('total')->default(0);
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
        Schema::dropIfExists('shipments');
    }
}
