<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('admin_id');
            $table->foreign('admin_id')->unsigned()->references('id')->on('admins')->onDelete('cascade');
            $table->integer('safe_id');
            $table->foreign('safe_id')->unsigned()->references('id')->on('safes')->onDelete('cascade');
            $table->double('amount');
            $table->string('bankname',255);
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
        Schema::dropIfExists('cios');
    }
}
