<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_cargo', function (Blueprint $table) {
            $table->string('id_persona', 15);
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_cargo')->unsigned();
            
            $table->foreign('id_persona')->references('id_persona')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id_club')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_cargo')->references('id')->on('cargo')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_club', 'id_cargo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_cargo');
    }
}
