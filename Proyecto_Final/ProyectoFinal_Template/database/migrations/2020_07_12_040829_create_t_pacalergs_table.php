<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPacalergsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pacalergs', function (Blueprint $table) {
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_alergia')->unsigned();
            $table->timestamps();
            $table->foreign('id_paciente')->references('id')->on('t_pacientes')->onDelete('cascade');
            $table->foreign('id_alergia')->references('id')->on('t_alergias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pacalergs');
    }
}
