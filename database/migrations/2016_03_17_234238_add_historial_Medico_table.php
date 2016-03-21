<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistorialMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_Medico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enfermedad');
            $table->date('fecha');
            $table->integer('id_animales')->unsigned();
            $table->foreign('id_animales')->references('id')->on('animales')->onDelete('cascade');
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
        Schema::drop('historial_Medico');
    }
}
