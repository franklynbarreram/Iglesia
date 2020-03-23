<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_especialidad', function (Blueprint $table) {
            $table->boolean('instructor');
            $table->string('id_persona', 15);
            $table->bigInteger('id_especialidad')->unsigned();

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_especialidad']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_especialidad');
    }
}
