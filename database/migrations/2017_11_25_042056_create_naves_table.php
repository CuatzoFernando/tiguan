<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return  void
   */
  public function up()
  {
    Schema::create('naves', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('proyecto');
        $table->string('imagen');
        $table->string('user');
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
      Schema::drop('naves');
  }
}
