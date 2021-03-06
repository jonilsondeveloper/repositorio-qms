<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->increments('id_calendario');
            $table->date('data');
            $table->integer('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id_especialidade')->on('especialidades');
            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id_medico')->on('medicos');
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
        Schema::dropIfExists('calendarios');
    }
}
