<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadisticasCorralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas_corrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pesaje_promedio');
            $table->integer('pesaje_maximo');
            $table->integer('pesaje_minimo');
            $table->integer('pesaje_total');
            $table->string('tipoMayorGanancia');
            $table->string('tipoMayorEnfermedad');
            $table->integer('ganancia_dinero');
            $table->integer('ganancia_peso');
            $table->integer('cantidad_enfermos');
            $table->integer('cantidad_muertos');
            $table->date('fecha');
            $table->integer('id_corral')->unsigned();
            $table->foreign('id_corral')->references('id')->on('corrales')->onUpdate('cascade')->onDelete('no action');
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
        Schema::drop('estadisticas_corrales');
    }
}
