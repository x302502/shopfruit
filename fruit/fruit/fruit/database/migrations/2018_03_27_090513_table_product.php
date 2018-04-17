<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product',function($table){
          $table->increments('id');
          $table->integer('detailcategoryid');
          $table->string('productname');
          $table->float('price');
          $table->string('status');
          $table->string('type');
          $table->string('description');
          $table->string('picture');

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
        Schema::dropIfExists('product');
    }
}
