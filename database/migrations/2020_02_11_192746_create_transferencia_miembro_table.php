<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciaMiembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia_miembro', function (Blueprint $table) {
            $table->date('fecha')->nullable();
            $table->bigInteger('id_club_solicitante')->unsigned();
            $table->bigInteger('id_club')->unsigned();
            $table->string('id_persona', 15);

            $table->foreign('id_persona')->references('id_persona')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id_club')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club_solicitante')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_club', 'id_club_solicitante'], 'pk_transferencia_miembro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferencia_miembro');
    }
}
