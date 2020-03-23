<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaCarpetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_carpeta', function (Blueprint $table) {
            $table->date('fecha_inicio');
            $table->date('fecha_investidura')->nullable();
            $table->boolean('firma_consejo_regional');
            $table->boolean('firma_lider_juvenil');
            $table->string('id_persona', 15);
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_carpeta')->unsigned();
            
            $table->foreign('id_persona')->references('id_persona')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id_club')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_carpeta')->references('id')->on('carpeta')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_club', 'id_carpeta']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_carpeta');
    }
}
