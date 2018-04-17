<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comment',function($table){
          $table->increments('id');
          $table->integer('productid');
          $table->integer('userid');
          $table->string('content');
          // $table->dateTime('create_at');
          // $table->dateTime('update_at');
          // $table->dateTime('delete_at');
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
        //
        Schema::dropIfExists('comment');
    }
}
