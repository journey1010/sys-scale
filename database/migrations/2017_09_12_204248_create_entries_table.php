<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resolutionNumber', 20);
            $table->string('resolutionType', 50);
            $table->date('issueDate');
            $table->string('issuingOrgan', 100);
            $table->date('startDate');
            $table->date('endDate');
            $table->string('description', 500);
            $table->string('constancyUrl', 200);
            $table->string('constancyPath', 200);
            $table->integer('state');

            $table->integer('id_user')->unsigned();
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
        Schema::table('entries', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('entries');
    }
}
