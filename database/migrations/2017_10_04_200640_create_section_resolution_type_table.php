<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionResolutionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_resolution_type', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_section')->unsigned()->nullable();
                $table->foreign('id_section')->references('id')->on('section')->onDelete('cascade');

            $table->integer('id_resolution_type')->unsigned()->nullable();
                $table->foreign('id_resolution_type')->references('id')->on('resolution_type')->onDelete('cascade');

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
        Schema::table('section_resolution_type', function (Blueprint $table) {
            $table->dropForeign(['id_section']);
            $table->dropForeign(['id_resolution_type']);
        });

        Schema::dropIfExists('section_resolution_type');
    }
}
