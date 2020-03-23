<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresidenteConsejoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presidente_consejo', function (Blueprint $table) {
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('id_persona', 15);
            $table->bigInteger('id_consejo')->unsigned();

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_consejo')->references('id')->on('consejo_regional')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_persona', 'id_consejo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presidente_consejo');
    }
}
