<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensingAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensing_authorization', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->integer('number_days');
            $table->string('comment');
            $table->integer('id_resolution')->unsigned();
            $table->boolean('with_remunerations'); //Con goce de remuneraciones
            $table->integer('license_resolution_type'); //1 resolucion de licencias con goce de remuneracion
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
        Schema::dropIfExists('licensing_authorization');
    }
}
