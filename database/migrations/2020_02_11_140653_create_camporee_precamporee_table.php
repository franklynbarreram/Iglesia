<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamporeePrecamporeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camporee_precamporee', function (Blueprint $table) {
            $table->integer('puntaje_maximo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('id_camporee')->unsigned();
            $table->bigInteger('id_precamporee')->unsigned();

            $table->foreign('id_camporee')->references('id')->on('camporee')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_precamporee')->references('id')->on('precamporee')->onDelete('restrict')->onUpdate('restrict');
            $table->primary(['id_precamporee', 'id_camporee']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camporee_precamporee');
    }
}
