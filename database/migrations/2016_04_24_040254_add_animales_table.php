<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('DIIO');
            $table->string('tipo');
            $table->integer('id_corral')->unsigned();
            $table->foreign('id_corral')->references('id')->on('corrales');
            $table->timestamps();
        });

        //compra/venta
        Schema::create('user_animal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animales')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->bigInteger('numero_Guia');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->integer('precio_ingreso');
            $table->integer('precio_salida');
            $table->string('procedencia');
            $table->foreign('id_animales')->references('id')->on('animales')->on('galpones')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->on('galpones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_animal');
        Schema::drop('animales');
    }
}
