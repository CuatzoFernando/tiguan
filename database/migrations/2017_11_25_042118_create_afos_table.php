<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('afos', function (Blueprint $table) {
           $table->increments('id');
           $table->string('nombre');
           $table->string('imagen');
           $table->string('linea');
           $table->string('user')->nullable();
           $table->integer('linea_id')->unsigned()->nullable();
           $table->foreign('linea_id')->references('id')->on('lineas')->onUpdate('cascade')->onDelete('cascade');
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
         Schema::drop('afos');
     }
}
