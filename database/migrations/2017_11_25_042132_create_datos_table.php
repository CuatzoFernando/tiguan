<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('datos', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('NAVES')->unsigned()->nullable();
           $table->foreign('NAVES')->references('id')->on('naves')->onUpdate('cascade')->onDelete('cascade');
           $table->string('PROYECTO');
           $table->integer('PROCESOS')->unsigned()->nullable();
           $table->foreign('PROCESOS')->references('id')->on('procesos')->onUpdate('cascade')->onDelete('cascade');
           $table->integer('LINEAS')->unsigned()->nullable();
           $table->foreign('LINEAS')->references('id')->on('lineas')->onUpdate('cascade')->onDelete('cascade');
           $table->integer('AFOS')->unsigned()->nullable();
           $table->foreign('AFOS')->references('id')->on('afos')->onUpdate('cascade')->onDelete('cascade');
           $table->string('V1')->nullable();
           $table->string('NOMBREPADRE')->nullable();
           $table->string('MODELOBEMIPADRE')->nullable();
           $table->string('DESCRIPCION')->nullable();
           $table->string('CANTPADRES')->nullable();
           $table->string('V2')->nullable();
           $table->string('NOMBREEQUIPO')->nullable();
           $table->string('MARCAEQUIPO')->nullable();
           $table->string('TYPE')->nullable();
           $table->string('NUMSERIE')->nullable();
           $table->string('DESCRIPCIONCOMPLEMENTARIA')->nullable();
           $table->string('MAXIMO')->nullable();
           $table->string('CANTELEMENTO')->nullable();
           $table->string('v3')->nullable();
           $table->string('NOMENCLATURA')->nullable();
           $table->string('NUMTABLERO')->nullable();
           $table->string('OBSERVACIONES')->nullable();
           $table->string('NUMINVENTARIO')->nullable();
           $table->string('user')->nullable();
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
         Schema::drop('datos');
     }
}
