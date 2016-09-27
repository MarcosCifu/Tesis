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
            $table->enum('tipo',['Vaca','Novillo','Vaquilla','Ternero','Ternera']);
            $table->enum('estado',['Vivo','Muerto','Enfermo']);
            $table->boolean('venta');
            $table->integer('pesaje_inicial');
            $table->integer('id_corral')->unsigned();
            $table->foreign('id_corral')->references('id')->on('corrales')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        //compra/venta
        Schema::create('user_animal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animales')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->bigInteger('numero_Guia');
            $table->string('procedencia');
            $table->date('fecha_compra');
            $table->date('fecha_venta');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->foreign('id_animales')->references('id')->on('animales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
        });
    }
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('animales','user_animal');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
