<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamporeeEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camporee_evento', function (Blueprint $table) {
            $table->integer('puntaje_maximo');
            $table->integer('participantes_federacion');
            $table->bigInteger('id_camporee')->unsigned();
            $table->bigInteger('id_evento')->unsigned();

            $table->foreign('id_camporee')->references('id')->on('camporee')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_evento')->references('id')->on('evento')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_evento', 'id_camporee']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camporee_evento');
    }
}
