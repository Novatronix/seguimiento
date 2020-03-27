<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->increments('id_historial');
            $table->string('num_cuenta');
            $table->string('id_clase');
            $table->bigInteger('id_periodo')->unsigned();
            $table->double('acumulativo') ->nullable();
            $table->double('nota_examen1')->nullable();
            $table->double('nota_examen2')->nullable();
            $table->double('nota_final')->nullable();
            $table->integer('faltas')->nullable();
            $table->string('estado')->nullable();
            $table->string('comentarios')->nullable();
            

            
            $table->foreign('num_cuenta')->references('num_cuenta')->on('alumnos')->onDelete('cascade');
            $table->foreign('id_clase')->references('id_clase')->on('clases')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiales');
    }
}
