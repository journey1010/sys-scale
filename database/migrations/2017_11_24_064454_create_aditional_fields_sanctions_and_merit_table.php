<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAditionalFieldsSanctionsAndMeritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditional_fields_sanctions_and_merit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo')->nullable();
            $table->string('descripcion_demerito')->nullable();
            $table->string('motivo')->nullable();
            $table->string('dependencia_destino')->nullable();
            $table->string('tiempo_sin_goce');
            $table->date('fecha_termino')->nullable();
            $table->integer('sacntion_time_year')->nullable();
            $table->integer('sacntion_time_months')->nullable();
            $table->integer('sacntion_time_days')->nullable();

            $table->integer('id_resolution')->unsigned()->nullable();
            $table->foreign('id_resolution')->references('id')->on('resolution');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aditional_fields_sanctions_and_merit');
    }
}
