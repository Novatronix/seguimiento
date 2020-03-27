<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_clase');
            $table->string('id_carrera');

            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_clase')->references('id_clase')->on('clases')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase_carreras');
    }
}
