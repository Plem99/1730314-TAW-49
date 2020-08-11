<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPacienteDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paciente_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('peso');
            $table->string('estatura');
            $table->string('imc');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_tipo_sangre')->unsigned();
            $table->timestamps();
            $table->foreign('id_paciente')->references('id')->on('t_pacientes')->onDelete('cascade');
            $table->foreign('id_tipo_sangre')->references('id')->on('t_tipo_sangres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_paciente_datos');
    }
}
