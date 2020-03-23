<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaRequisitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_requisito', function (Blueprint $table) {
            $table->boolean('aprobado');
            $table->date('fecha');
            $table->string('descripcion', 300)->nullable();
            $table->string('url_foto', 100)->nullable();
            $table->string('id_persona', 15);
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_requisito')->unsigned();
            
            $table->foreign('id_persona')->references('id_persona')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id_club')->on('persona_club')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_requisito')->references('id')->on('requisito')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_club', 'id_requisito'], 'pk_persona_requisito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_requisito');
    }
}
