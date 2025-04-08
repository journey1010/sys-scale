<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_authorization', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_start')->nullable();
            $table->date('date_end');
            $table->integer('number_days');
            $table->string('comment');
            $table->integer('id_resolution')->unsigned();
            $table->boolean('with_remunerations'); //Con goce de remuneraciones
            $table->integer('permit_reason'); //1 resolucion de licencias con goce de remuneracion
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
        Schema::dropIfExists('permit_authorization');
    }
}
