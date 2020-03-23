<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncripcionClaseEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incripcion_clase_especialidad', function (Blueprint $table) {
            $table->integer('nota');
            $table->boolean('firma_instructor');
            $table->boolean('firma_lider_juvenil');
            $table->integer('bloque');
            $table->string('id_persona', 15);
            $table->bigInteger('id_clase_especialidad')->unsigned();

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_clase_especialidad')->references('id')->on('clase_especialidad')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_clase_especialidad'], 'pk_inscripcion_especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incripcion_clase_especialidad');
    }
}
