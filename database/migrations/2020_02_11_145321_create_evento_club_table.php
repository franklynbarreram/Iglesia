<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_club', function (Blueprint $table) {
            $table->integer('puntuacion');
            $table->integer('puntuacion_eliminatoria');
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_evento')->unsigned();
            $table->bigInteger('id_camporee')->unsigned();

            $table->foreign('id_club')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_evento')->references('id_evento')->on('camporee_evento')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_camporee')->references('id_camporee')->on('camporee_evento')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_club', 'id_evento', 'id_camporee']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_club');
    }
}
