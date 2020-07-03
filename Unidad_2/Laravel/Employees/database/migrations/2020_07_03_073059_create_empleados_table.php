<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('cedula');
            $table->string('email');
            $table->string('lugar_nacimiento');
            $table->enum('sexo',['masculino','femenino','no definido']);
            $table->enum('estado_civil',['soltero','casado']);
            $table->string('telefono');
            $table->integer('id_departamentos')->unsigned();
            $table->timestamps();

            $table->foreign('id_departamentos')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
