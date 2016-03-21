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
            $table->bigInteger('numero_Guia');
            $table->string('tipo');
            $table->integer('id_corral')->unsigned();
            $table->foreign('id_corral')->references('id')->on('Corral');
            $table->timestamps();
        });

        //compra/venta
        Schema::create('user_animal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animales')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('fecha_compra');
            $table->date('fecha_venta');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->string('procedencia');
            $table->foreign('id_animales')->references('id')->on('animales');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('animales');
    }
}
