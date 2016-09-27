<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('estadisticas_animales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animales')->unsigned();
            $table->integer('id_estadisticas')->unsigned();
            $table->integer('ganancia_peso');
            $table->integer('distribucion');
            $table->integer('ganacia_dinero');
            $table->foreign('id_animales')->references('id')->on('animales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_estadisticas')->references('id')->on('estadisticas')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('estadisticas_corrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corralMayorGanancia');
            $table->integer('pesaje_promedio');
            $table->string('tipoMayorGanancia');
            $table->string('tipoMayorEnfermedad');
            $table->integer('ganacia_dinero');
            $table->integer('id_corrales')->unsigned();
            $table->integer('id_estadisticas')->unsigned();
            $table->foreign('id_corrales')->references('id')->on('corrales')->onUpdate('cascade');
            $table->foreign('id_estadisticas')->references('id')->on('estadisticas')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('estadisticas_galpones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_galpones')->unsigned();
            $table->integer('id_estadisticas')->unsigned();
            $table->integer('pesaje_promedio');
            $table->foreign('id_galpones')->references('id')->on('galpones')->onUpdate('cascade');
            $table->foreign('id_estadisticas')->references('id')->on('estadisticas')->onUpdate('cascade');
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
        Schema::drop('estadisticas');
    }
}
