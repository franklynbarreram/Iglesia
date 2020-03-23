<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipanteEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_evento', function (Blueprint $table) {
            $table->string('id_persona', 15);
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_evento')->unsigned();
            $table->bigInteger('id_camporee')->unsigned();

            $table->foreign('id_club')->references('id_club')->on('evento_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_evento')->references('id_evento')->on('evento_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_camporee')->references('id_camporee')->on('evento_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_club', 'id_evento', 'id_camporee', 'id_persona'], 'pk_participante_evento');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participante_evento');
    }
}
