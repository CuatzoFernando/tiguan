<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('procesos', function (Blueprint $table) {
           $table->increments('id');
           $table->string('nombre');
           $table->string('imagen');
           $table->enum('tipo',['proces', 'transporte'])->default('proces');
           $table->string('user')->nullable();
           $table->integer('nave_id')->unsigned()->nullable();
           $table->foreign('nave_id')->references('id')->on('naves')->onUpdate('cascade')->onDelete('cascade');
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
         Schema::drop('procesos');
     }
}
