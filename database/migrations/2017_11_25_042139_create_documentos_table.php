<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('documentos', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('padre_id')->unsigned()->nullable();
           $table->foreign('padre_id')->references('id')->on('padres')->onUpdate('cascade')->onDelete('cascade');
           $table->string('nombre');
           $table->string('user');
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
         Schema::drop('documentos');
     }
}
