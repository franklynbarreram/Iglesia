<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_club', function (Blueprint $table) {
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('id_persona', 15);
            $table->bigInteger('id_club')->unsigned();

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_club']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_club');
    }
}
