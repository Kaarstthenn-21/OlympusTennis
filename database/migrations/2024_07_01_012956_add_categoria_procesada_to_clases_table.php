<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaProcesadaToClasesTable extends Migration
{
    public function up()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->string('categoria_procesada')->nullable();
        });
    }

    public function down()
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->dropColumn('categoria_procesada');
        });
    }
}
