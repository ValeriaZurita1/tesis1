<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DescripAsis');
            $table->date('fechaAsis');
            $table->string('estado',1);
            $table->integer('user_paralelo_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_paralelo_id')->references('id')->on('paralelo_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
