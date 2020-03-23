<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->string('cedula', 15)->primary();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fecha_nacimiento');
            $table->string('direccion', 100);
            $table->string('tipo_sangre', 4);
            $table->string('alergias', 100);
            $table->string('enfermedades',100);
            $table->date('fecha_bautizo');
            $table->integer('telefono');
            $table->string('profesion', 20);
            $table->string('sexo', 1);
            $table->string('estado_civil', 1);
            $table->bigInteger('id_iglesia')->unsigned();
            $table->integer('id_user')->unsigned();

            $table->foreign('id_iglesia')->references('id')->on('iglesia')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
