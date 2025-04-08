<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterDoctorDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_doctor_degree', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_school',100)->nullable();
            $table->string('concentration', 100)->nullable();
            $table->date('date_expedition')->nullable();
            $table->date('date_begin')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('years_diff')->nullable();
            $table->integer('months_diff')->nullable();
            $table->integer('days_diff')->nullable();
            $table->string('url_certificate', 150)->nullable();
            $table->string('path_certificate', 150)->nullable();
            $table->integer('state_validation')->nullable();

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
        Schema::dropIfExists('master_doctor_degree');
    }
}
