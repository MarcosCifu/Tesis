<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('corral_atributo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_corral')->unsigned();
            $table->integer('id_atributo')->unsigned();
            $table->foreign('id_corral')->references('id')->on('corrales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_atributo')->references('id')->on('atributos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('atributos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
