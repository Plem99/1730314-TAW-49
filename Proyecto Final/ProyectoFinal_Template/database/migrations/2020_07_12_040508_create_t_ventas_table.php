<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('subtotal', 8, 2);
            $table->float('total', 8, 2);
            $table->timestamp('fecha');
            $table->integer('id_consulta')->unsigned();
            $table->timestamps();
            $table->foreign('id_consulta')->references('id')->on('t_consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_ventas');
    }
}
