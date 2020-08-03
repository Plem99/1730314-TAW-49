<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamp('fecha');
            $table->integer('id_paciente')->unsigned();
            $table->timestamps();
            $table->foreign('id_paciente')->references('id')->on('t_pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_citas');
    }
}
