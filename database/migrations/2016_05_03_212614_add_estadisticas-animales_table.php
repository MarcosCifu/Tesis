<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadisticasAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas_animales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ganancia_peso');
            $table->integer('distribucion');
            $table->integer('ganacia_dinero');
            $table->integer('id_animal')->unsigned();
            $table->foreign('id_animal')->references('id')->on('animales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('estadisticas_animales');
    }
}
