<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadisticasGalponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas_galpones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pesaje_promedio');
            $table->integer('id_galpon')->unsigned();
            $table->foreign('id_galpon')->references('id')->on('galpones')->onUpdate('cascade');
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
    }
}
