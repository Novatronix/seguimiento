<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_cuenta');
            $table->string('id_carrera');

            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('num_cuenta')->references('num_cuenta')->on('alumnos')->onDelete('cascade');
            
 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_carreras');
    }
}
