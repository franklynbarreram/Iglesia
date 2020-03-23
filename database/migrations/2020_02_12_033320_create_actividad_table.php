<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->integer('asistencia');
            $table->string('descripcion', 300);
            $table->string('url_foto', 100);
            $table->string('lugar', 100);
            $table->bigInteger('id_tipo')->unsigned();
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_requisito')->unsigned()->nullable();

            $table->foreign('id_tipo')->references('id')->on('tipo_actividad')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_requisito')->references('id')->on('requisito')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad');
    }
}
