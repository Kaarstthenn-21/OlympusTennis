<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscribirseTorneoTable extends Migration
{
    public function up()
    {
        Schema::create('inscribirse_torneo', function (Blueprint $table) {
            $table->id('id_inscripciontorneo');
            $table->unsignedBigInteger('id_torneo');
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre_usuario');
            $table->integer('cupos_totales');
            $table->integer('cupos_disponibles');
            $table->timestamps();

            $table->foreign('id_torneo')->references('id_torneo')->on('torneos');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscribirse_torneo');
    }
}
