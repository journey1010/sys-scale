<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolution', function (Blueprint $table) {

            $table->increments('id');
            $table->string('resolution_number')->nullable();
            $table->integer('id_resolution_type')->unsigned()->nullable();
            $table->foreign('id_resolution_type')->references('id')->on('resolution_type');
            $table->integer('id_section')->unsigned()->nullable();
            $table->foreign('id_section')->references('id')->on('section');
            $table->date('issue_date')->nullable();
            $table->string('issuing_organ')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('work_position')->nullable();
            $table->string('workplace')->nullable();
            $table->string('constancy_path')->nullable();
            $table->string('constancy_url')->nullable();
            $table->integer('state_validation')->nullable();

            $table->integer('id_user')->unsigned()->nullable();
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
        Schema::table('resolution', function (Blueprint $table) {
            $table->dropForeign(['id_resolution_type']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('resolution');

    }

}

//TODO: Cambiar migración para reflejar comportamiento de nuevas vistas
