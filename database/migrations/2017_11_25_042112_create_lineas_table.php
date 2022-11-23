<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('lineas', function (Blueprint $table) {
           $table->increments('id');
           $table->string('nombre');
           $table->string('imagen');
           $table->string('user')->nullable();
           $table->integer('proceso_id')->unsigned()->nullable();
           $table->foreign('proceso_id')->references('id')->on('procesos')->onUpdate('cascade')->onDelete('cascade');
           $table->softDeletes();
           $table->timestamps();
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return  void
      */
     public function down()
     {
         Schema::drop('lineas');
     }
}
