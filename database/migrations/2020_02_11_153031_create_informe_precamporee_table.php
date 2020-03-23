<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformePrecamporeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_precamporee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('puntuacion');
            $table->date('fecha_enviado');
            $table->boolean('firma_pastor');
            $table->boolean('firma_consejo_regional');
            $table->string('descripción', 300);
            $table->string('url_foto', 100);
            $table->bigInteger('id_club')->unsigned();
            $table->bigInteger('id_camporee')->unsigned();
            $table->bigInteger('id_precamporee')->unsigned();

            $table->foreign('id_camporee')->references('id_camporee')->on('camporee_precamporee')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_precamporee')->references('id_precamporee')->on('camporee_precamporee')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_club')->references('id')->on('club')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_precamporee');
    }
}
