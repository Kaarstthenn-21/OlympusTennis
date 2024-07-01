<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id('id_partido');
            $table->unsignedBigInteger('id_torneo');
            $table->integer('ronda');
            $table->integer('nro_partido');
            $table->unsignedBigInteger('jugador1')->nullable();
            $table->string('nombre_jugador1')->nullable();
            $table->unsignedBigInteger('jugador2')->nullable();
            $table->string('nombre_jugador2')->nullable();
            $table->string('cancha')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('ganador')->nullable();
            $table->string('puntaje')->nullable();
            $table->timestamps();

            $table->foreign('id_torneo')->references('id_torneo')->on('torneos');
            $table->foreign('jugador1')->references('id_inscripciontorneo')->on('inscribirse_torneo');
            $table->foreign('jugador2')->references('id_inscripciontorneo')->on('inscribirse_torneo');
            $table->foreign('ganador')->references('id_inscripciontorneo')->on('inscribirse_torneo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
