<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePersonalIdentification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_identification', function (Blueprint $table) {
            $table->integer('id_labor_conditional')->unsigned()->nullable();
            $table->integer('id_dependence')->unsigned()->nullable();
            $table->integer('id_affiliation_document')->unsigned()->nullable();

            $table->foreign('id_labor_conditional')->references('id')->on('labor_conditional');
            $table->foreign('id_dependence')->references('id')->on('dependence');
            $table->foreign('id_affiliation_document')->references('id')->on('affiliation_document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_identification', function (Blueprint $table) {
            $table->dropForeign(['id_labor_conditional']);
            $table->dropForeign(['id_dependence']);
            $table->dropForeign(['id_affiliation_document']);
        });
    }
}
