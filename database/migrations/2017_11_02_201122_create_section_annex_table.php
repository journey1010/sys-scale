<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionAnnexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_annex', function (Blueprint $table) {
            $table->increments('id');

            $table->text('name');
            $table->string('number_doc')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_url')->nullable();

            $table->integer('id_section')->unsigned()->nullable();
            $table->foreign('id_section')->references('id')->on('section');

            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users');

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
        Schema::table('section_annex', function (Blueprint $table) {
            $table->dropForeign(['id_section']);
        });

        Schema::dropIfExists('section_annex');
    }
}
