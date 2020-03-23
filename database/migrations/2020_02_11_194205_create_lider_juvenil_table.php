<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiderJuvenilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lider_juvenil', function (Blueprint $table) {
            $table->date('fecha_inicio')->primary();
            $table->date('fecha_fin')->nullable();
            $table->string('id_persona', 15);

            $table->foreign('id_persona')->references('cedula')->on('persona')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lider_juvenil');
    }
}
