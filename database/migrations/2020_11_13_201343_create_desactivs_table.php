<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesactivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desactivs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado',1);
            $table->string('tiempo');
            $table->string('tiempoV');
            $table->string('Alumno');
            $table->integer('idSecact')->unsigned();
            $table->foreign('idSecact')->references('id')->on('seccion_activs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desactivs');
    }
}
