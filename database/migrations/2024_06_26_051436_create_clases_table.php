<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->string('instructor');
            $table->integer('cupos_totales');
            $table->integer('duracion');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->decimal('costo_inscripcion', 8, 2);
            $table->text('informacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->dropForeign(['id_categoria']);
        });

        Schema::dropIfExists('clases');
    }
};
