<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order',function($table){
          $table->increments('id');
          $table->integer('quantity');
          $table->float('totalprice');
          $table->string('namecustomer');
          $table->string('address');
          $table->string('phonenumber');
          $table->boolean('status');
          $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('order');
    }
}
