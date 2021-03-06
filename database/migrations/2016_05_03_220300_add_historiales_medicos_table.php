<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistorialesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enfermedad');
            $table->string('tratamiento');
            $table->enum('estado_tratamiento',['En tratamiento','Tratamiento terminado']);
            $table->date('fecha');
            $table->integer('id_animales')->unsigned();
            $table->foreign('id_animales')->references('id')->on('animales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('historiales_medicos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
