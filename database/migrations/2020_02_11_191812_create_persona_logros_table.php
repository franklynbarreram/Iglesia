<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaLogrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_logros', function (Blueprint $table) {
            $table->date('fecha');
            $table->string('id_persona', 15);
            $table->bigInteger('id_logros')->unsigned();

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_logros')->references('id')->on('logros')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_logros']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_logros');
    }
}
