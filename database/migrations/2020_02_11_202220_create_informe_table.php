<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe', function (Blueprint $table) {
            $table->string('mes', 15)->primary();
            $table->integer('reuniones_directiva');
            $table->integer('reuniones_padres');
            $table->integer('porcentaje_asistencia');
            $table->integer('involucrados_sj');
            $table->integer('numero_gpss');
            $table->integer('numero_almas_alcanzado');
            $table->integer('miembros_recibiendo_e_b');
            $table->integer('miembros_dando_e_b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe');
    }
}
