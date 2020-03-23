<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_especialidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->integer('cupos_bloque');
            $table->integer('bloques');
            $table->string('url_foto', 100)->nullable();
            $table->bigInteger('id_feria')->unsigned()->nullable();
            $table->string('id_instructor', 15);
            $table->bigInteger('id_especialidad')->unsigned();
            $table->bigInteger('id_club')->unsigned();

            $table->foreign('id_instructor')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_feria')->references('id')->on('feria_especialidades')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase_especialidad');
    }
}
