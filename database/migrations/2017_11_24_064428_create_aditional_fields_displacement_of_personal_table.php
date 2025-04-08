<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAditionalFieldsDisplacementOfPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditional_fields_displacement_of_personal', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo')->nullable();
            $table->string('charge')->nullable();
            $table->string('dependencia_origen')->nullable();
            $table->string('dependencia_destino')->nullable();
            $table->integer('displacement_time_years')->nullable();
            $table->integer('displacement_time_months')->nullable();
            $table->integer('displacement_time_days')->nullable();

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
        Schema::dropIfExists('aditional_fields_displacement_of_personal');
    }
}
