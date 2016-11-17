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
            $table->integer('corralMayorGanancia');
            $table->integer('pesaje_promedio');
            $table->string('tipoMayorGanancia');
            $table->string('tipoMayorEnfermedad');
            $table->integer('ganacia_dinero');
            $table->integer('id_corral')->unsigned();
            $table->foreign('id_corral')->references('id')->on('corrales')->onUpdate('cascade')->onDelete('cascade');
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
