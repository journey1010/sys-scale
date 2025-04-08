<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAditionalFieldsEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditional_fields_entries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo')->nullable();
            $table->integer('contract_time_years')->nullable();
            $table->integer('contract_time_months')->nullable();
            $table->integer('contract_time_days')->nullable();
            $table->string('dependency')->nullable();
            $table->string('category')->nullable();
            $table->string('charge')->nullable();

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
        Schema::dropIfExists('aditional_fields_entries');
    }
}
