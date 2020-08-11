<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMedrecetadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_medrecetados', function (Blueprint $table) {
            $table->integer('id_consulta')->unsigned();
            $table->integer('id_medicamento')->unsigned();
            $table->timestamps();
            $table->foreign('id_consulta')->references('id')->on('t_consultas')->onDelete('cascade');
            $table->foreign('id_medicamento')->references('id')->on('t_medicamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_medrecetados');
    }
}
