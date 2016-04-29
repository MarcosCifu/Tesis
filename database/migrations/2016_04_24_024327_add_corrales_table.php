<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('cantidad');
            $table->integer('id_galpon')->unsigned();
            $table->foreign('id_galpon')->references('id')->on('galpones')->onDelete('cascade');
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
        Schema::drop('corrales');
    }
}
