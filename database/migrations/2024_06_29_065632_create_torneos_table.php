<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id('id_torneo');
            $table->unsignedBigInteger('id_categoria');
            $table->string('organizador');
            $table->string('nombre_torneo');
            $table->enum('modalidad', ['individual', 'duos']);
            $table->integer('cupos_totales');
            $table->date('fecha_inicio');
            $table->decimal('costo_inscripcion', 8, 2);
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('torneos');
    }
}
