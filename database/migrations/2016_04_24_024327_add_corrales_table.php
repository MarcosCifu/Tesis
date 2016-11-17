<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorralesTable extends Migration
{
    /**     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('cantidad_alimento');
            $table->integer('cantidad_animales');
            $table->integer('nivel_confort');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('corrales');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
