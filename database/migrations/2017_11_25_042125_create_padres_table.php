<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('padres', function (Blueprint $table) {
           $table->increments('id');
           $table->string('NOMBREPADRE');
           $table->string('imagen');
           $table->string('user')->nullable();
           $table->integer('linea_id')->unsigned()->nullable();
           $table->foreign('linea_id')->references('id')->on('lineas')->onUpdate('cascade')->onDelete('cascade');
           $table->integer('afo_id')->unsigned()->nullable();
           $table->foreign('afo_id')->references('id')->on('afos')->onUpdate('cascade')->onDelete('cascade');
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
         Schema::drop('padres');
     }
}
