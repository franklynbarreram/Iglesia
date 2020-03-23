<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('decripcion', 300);
            $table->bigInteger('id_seccion')->unsigned();
            $table->bigInteger('id_requisito')->unsigned();
            $table->bigInteger('id_especialidad')->unsigned()->nullable();

            $table->foreign('id_seccion')->references('id')->on('seccion')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_requisito')->references('id')->on('requisito')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisito');
    }
}
