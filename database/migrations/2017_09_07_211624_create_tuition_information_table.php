<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuitionInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_tuition', 100)->nullable();
            $table->string('url_certificate', 150)->nullable();
            $table->string('path_certificate', 150)->nullable();
            $table->integer('state_validation')->nullable();;

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
        Schema::dropIfExists('tuition_information');
    }
}
