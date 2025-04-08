<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_authorization', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->integer('number_days');
            $table->integer('anio');
            $table->string('comment');
            $table->integer('id_resolution')->unsigned();
            $table->integer('memorandum_type'); //Memorando de vacaciones 1 presente 2 anteriores
            $table->integer('license_resolution_type'); //1 por matrimonio 2 por enfermedad grave de familiar
            $table->integer('suspension_document_type');
            $table->timestamps();

            $table->foreign('id_resolution')->references('id')->on('resolution');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacation_authorization');
    }
}
