<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombUsDes');
            $table->integer('notaDes');
            $table->date('fechaDes');
            $table->integer('descTest')->unsigned();
            $table->timestamps();
            $table->foreign('descTest')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destests');
    }
}
